<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $products = Product::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $products = Product::all();
        }

        return view('allProducts', compact('products'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'quantity' => 'required|string|max:255',
            'purchase_price' => 'required|string|max:255',
            'amount_due' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }



        $item = new Product();
        $item->name = $request->name;
        $item->quantity = $request->quantity;
        $item->purchase_price = $request->purchase_price;
        $item->amount_due = $request->amount_due;
        $item->supplier_id = $request->supplier_id;
        $item->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'New Purchase saved successfully.');
        return back()->withInput();
    }


    public function prepareNewPurchase(Request $request)
    {
        $suppliers = Supplier::all();
        return view('addProduct', compact('suppliers'));
    }
}
