<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $items = Shop::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $items = Shop::all();
        }
        return view('poultry/allShops', compact('items'));
    }



    public function driverShops(Request $request, $driverId)
    {
        return Auth::user()->shops;
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'shop_name' => 'required|string|min:1|max:255',
            'shop_address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }


        $driver = new Shop();
        $driver->name = $request->shop_name;
        $driver->address = $request->shop_address;

        $driver->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'Shop details saved successfully.');
        return back()->withInput();
    }
}
