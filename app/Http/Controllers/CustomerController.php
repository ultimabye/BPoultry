<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $customers = Customer::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $customers = Customer::all();
        }

        return view('allCustomers', compact('customers'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'number' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }



        $post = new Customer();
        $post->name = $request->name;
        $post->number = $request->number;
        $post->address = $request->address;
        $post->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'New Customer saved successfully.');
        return back()->withInput();
    }
}
