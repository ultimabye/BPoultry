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
            $totalAmount += ($item->quantity * $item->price_per_unit) - (($item->quantity * $item->price_per_unit) / 100 * $item->discount);
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
            //purchase data
            'product' => 'required|string|min:1|max:255',
            'quantity' => 'required|string|max:255',
            'price_per_unit' => 'required|integer',
            'purchase_freight_charges' => 'required|integer',
            'purchase_discount' => 'required|integer',
            'date' => 'required|date',

            //sale data
            'customer' => 'required|string|max:255',
            'sale_freight_charges' => 'required|numeric',
            'sale_discount' => 'required|integer',
            'sale_price_per_unit' => 'required|integer',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }


        $product = Product::where("id", $request->product)->first();
        if ($product) {
            $date = new DateTime($request->date);

            $purchase = new Purchase();
            $purchase->product_id = $request->product;
            $purchase->price_per_unit = $request->price_per_unit;
            $purchase->quantity = $request->quantity;
            $purchase->freight_charges = $request->purchase_freight_charges;
            $purchase->amount_due = $request->price_per_unit * $request->quantity;
            $purchase->date = $date->getTimestamp();


            $item = new Sale();
            $item->product_id = $request->product;
            $item->customer_id = $request->customer;
            $item->quantity = $request->quantity;
            $item->freight_charges = $request->sale_freight_charges;
            $item->price_per_unit = $request->sale_price_per_unit;

            $item->amount_due = ($request->sale_price_per_unit * $request->quantity)
                - (($request->sale_price_per_unit * $request->quantity) / 100 * $request->sale_discount)
                + $item->freight_charges;

            $item->discount = $request->sale_discount;
            $item->date = $date->getTimestamp();
            $item->save();

            $purchase->sale_id = $item->id;
            $purchase->save();


            $product->available_stock = $product->available_stock - $item->quantity;
            if ($product->available_stock < 0) {
                $product->available_stock = 0;
            }
            $product->save();



            $subTotal = $item->product->unit_price * $item->quantity;
            $total = $subTotal + $item->freight_charges;
            $discountRate = $item->discount;
            $discountAmount = 0;
            $discountAmount = $subTotal / 100 * $discountRate;

            return redirect()->route('saleSuccess')->with(
                [
                    'order_id' => $purchase->id
                ]
            );
        }

        Session::flash('status', "error");
        Session::flash('status-message', 'Specified product not found.');
        return back()->withInput();
    }


    public function prepareNewSale(Request $request)
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('newSale', compact('suppliers', 'products', 'customers'));
    }
}
