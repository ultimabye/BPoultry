<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DriverController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $items = User::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $items = User::all();
        }
        return view('poultry/allDrivers', compact('items'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'contact_number' => 'required|string|max:255',
            'cnic' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }


        $driver = new User();
        $driver->name = $request->name;
        $driver->email = $request->cnic;
        $driver->password = Str::random(6);
        $driver->contact_no = $request->contact_number;
        $driver->cnic = $request->cnic;
        $driver->license_no = $request->license;
        $driver->route_no = $request->route_number;
        $driver->route_name = $request->route_name;

        $driver->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'Driver details saved successfully.');
        return back()->withInput();
    }
}
