<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Supplier;
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

        return view('allSales', compact('sales'));
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|string|min:1|max:255',
            'customer_id' => 'required|string|max:255',
            'supplier_id' => 'required|string|max:255',
            'sale_price' => 'required|string|max:255',
            'amount_due' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }



        $item = new Sale();
        $item->product_id = $request->product_id;
        $item->customer_id = $request->customer_id;
        $item->supplier_id = $request->supplier_id;
        $item->quantity = $request->quantity;
        $item->sale_price = $request->sale_price;
        $item->amount_due = $request->amount_due;
        $item->discount = $request->discount;
        $item->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'New Sale saved successfully.');
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
