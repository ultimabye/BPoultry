<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $purchases = Purchase::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $purchases = Purchase::all();
        }

        $totalAmount = 0;
        $amountDue = 0;

        foreach ($purchases as $item) {
            $totalAmount += $item->quantity * $item->product->unit_price;
            $totalAmount += $item->freight_charges;

            $amountDue += $item->amount_due;
        }

        $amountPaid = $totalAmount - $amountDue;

        return view('allPurchases', compact(
            'purchases',
            'totalAmount',
            'amountDue',
            'amountPaid'
        ));
    }



    public function store(Request $request)
    {
        //return $request;
        $validator = Validator::make($request->all(), [
            'product' => 'required|string|min:1|max:255',
            'quantity' => 'required|string|max:255',
            'freight_charges' => 'required|string|max:255',
            'due_amount' => 'required|integer',
            'date' => 'required|date'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }


        $date = new DateTime($request->date);

        $item = new Purchase();
        $item->product_id = $request->product;
        $item->quantity = $request->quantity;
        $item->freight_charges = $request->freight_charges;
        $item->amount_due = $request->due_amount;
        $item->date = $date->getTimestamp();
        $item->save();

        $product = Product::where("id", $item->product_id)->first();
        $product->available_stock = $product->available_stock + $item->quantity;
        $product->save();

        Session::flash('status', "success");
        Session::flash('status-message', 'New Purchase saved successfully.');
        return back()->withInput();
    }


    public function prepareNewPurchase(Request $request)
    {
        $products = Product::all();
        return view('addPurchase', compact('products'));
    }
}
