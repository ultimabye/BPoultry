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


    public function viewShop(Request $request, $id)
    {
        if ($id) {
            $item = Shop::where('id', '=', $id)->first();
            return view('poultry/updateShop', compact('item'));
        }
        Session::flash('status', "error");
        Session::flash('status-message', "No shop found with given id:" . $id);
        return back()->withInput();
    }



    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|min:1|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }

        if ($request->id) {
            $item = Shop::where('id', '=', $request->id)->first();
            if ($request->name) {
                $item->name = $request->name;
            }

            if ($request->address) {
                $item->address = $request->address;
            }

            $item->save();
            Session::flash('status', "success");
            Session::flash('status-message', 'Shop updated successfully.');
            return back()->withInput();
        }

        Session::flash('status', "error");
        Session::flash('status-message', "No shop found with given id:" . $request->id);
        return back()->withInput();
    }
}
