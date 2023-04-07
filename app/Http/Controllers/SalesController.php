<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Supplier;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $sales = Sale::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $sales = Sale::all();
        }

        $totalAmount = 0;
        $amountDue = 0;

        foreach ($sales as $item) {
            $totalAmount += ($item->quantity * $item->product->unit_price) - (($item->quantity * $item->product->unit_price) / 100 * $item->discount);
            $totalAmount += $item->freight_charges;

            $amountDue += $item->amount_due;
        }

        $amountReceived = $totalAmount - $amountDue;

        return view('allSales', compact(
            'sales',
            'totalAmount',
            'amountReceived',
            'amountDue'
        ));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|string|min:1|max:255',
            'customer_id' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'freight_charges' => 'required|numeric',
            'discount' => 'required|integer',
            'due_amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }


        $product = Product::where("id", $request->product_id)->first();
        if ($product && $request->quantity <= $product->available_stock) {
            $date = new DateTime($request->date);

            $item = new Sale();
            $item->product_id = $request->product_id;
            $item->customer_id = $request->customer_id;
            $item->quantity = $request->quantity;
            $item->freight_charges = $request->freight_charges;
            $item->amount_due = $request->due_amount;
            $item->discount = $request->discount;
            $item->date = $date->getTimestamp();
            $item->save();

            $product->available_stock = $product->available_stock - $item->quantity;
            if ($product->available_stock < 0) {
                $product->available_stock = 0;
            }
            $product->save();
            Session::flash('status', "success");
            Session::flash('status-message', 'New Sale saved successfully.');
            return back()->withInput();
        }

        Session::flash('status', "error");
        Session::flash('status-message', 'Specified product is out of stock.');
        return back()->withInput();
    }


    public function prepareNewSale(Request $request)
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('addSale', compact('suppliers', 'products', 'customers'));
    }
}
