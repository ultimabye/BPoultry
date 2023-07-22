<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopDriverPivot;
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
            $items = User::where('name', 'like', '%' . $query . '%')
                ->where("is_admin", false)->get();
        } else {
            $items = User::where("is_admin", false)->get();
        }
        return view('poultry/allDrivers', compact('items'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'contact_number' => 'required|string|max:255',
            'cnic' => 'required|string|max:255',
            'vehicle_no' => 'required|string|max:255',
            'route_name' => 'required|string|max:255',
            'password' => 'required|min:5|string|max:255',
            'repeat_password' => 'required|min:5|string|max:255'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }

        if ($request->password != $request->repeat_password) {
            Session::flash('status', "error");
            Session::flash('status-message', "Password does not match!");
            return back()->withInput();
        }

        $driver = new User();
        $driver->name = $request->name;
        $driver->email = $request->cnic;
        $driver->password = Hash::make($request->password);
        $driver->contact_no = $request->contact_number;
        $driver->cnic = $request->cnic;
        $driver->license_no = $request->license;
        $driver->vehicle_no = $request->vehicle_no;
        $driver->route_name = $request->route_name;
        $driver->save();

        if ($request->shops) {
            if (!empty($request->shops)) {
                //save all pivots.
                foreach ($request->shops as $shop) {
                    //delete all previous pivots
                    $pivots = ShopDriverPivot::where("shop_id", $shop);
                    $pivots->delete();

                    $pivot = ShopDriverPivot::where("shop_id", $shop)
                        ->where("driver_id", $driver->id)->first();
                    if ($pivot === null) {
                        $pivot = ShopDriverPivot::create([
                            "shop_id" => $shop,
                            "driver_id" => $driver->id
                        ]);
                    }
                }
            }
        }
        $driver->save();

        Session::flash('status', "success");
        Session::flash('status-message', 'Driver details saved successfully.');
        return back()->withInput();
    }



    public function viewDriver(Request $request, $id)
    {
        if ($id) {
            $item = User::where('id', '=', $id)->first();
            $shops = Shop::all();
            return view('poultry/updateDriver', compact('item', 'shops'));
        }
        Session::flash('status', "error");
        Session::flash('status-message', "No driver found with given id:" . $id);
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
            $item = User::where('id', '=', $request->id)->first();
            if ($request->name) {
                $item->name = $request->name;
            }

            if ($request->contact_number) {
                $item->contact_no = $request->contact_number;
            }

            if ($request->cnic) {
                $item->cnic = $request->cnic;
                $item->email = $item->cnic;
            }

            if ($request->license_number) {
                $item->license_no = $request->license_number;
            }


            if ($request->vehicle_no) {
                $item->vehicle_no = $request->vehicle_no;
            }

            if ($request->route_name) {
                $item->route_name = $request->route_name;
            }
            if ($request->password) {
                $item->password=  Hash::make($request->password);
            }

            if ($request->shops && !empty($request->shops)) {
                //save all pivots.
                foreach ($request->shops as $shop) {
                    //delete all previous pivots
                    $pivots = ShopDriverPivot::where("shop_id", $shop);
                    $pivots->delete();

                    $pivot = ShopDriverPivot::where("shop_id", $shop)
                        ->where("driver_id", $item->id)->first();
                    if ($pivot === null) {
                        $pivot = ShopDriverPivot::create([
                            "shop_id" => $shop,
                            "driver_id" => $item->id
                        ]);
                    }
                }
            } else {
                //delete driver pivots.
                $pivots = ShopDriverPivot::where("driver_id", $item->id);
                $pivots->delete();
            }

            $item->save();
            Session::flash('status', "success");
            Session::flash('status-message', 'Driver details updated successfully.');
            return back()->withInput();
        }

        Session::flash('status', "error");
        Session::flash('status-message', "No driver found with given id:" . $request->id);
        return back()->withInput();
    }
}
