<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Contractor;
use App\Models\ContractorPayment;
use App\Models\Shop;
use App\Models\ShopContractorPivot;
use App\Models\ShopPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class ContractorController extends Controller
{


    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $items = Contractor::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $items = Contractor::all();
        }
        //$items = $items[0]->shops()->get();
        //return $items;
        return view('poultry/allContractors', compact('items'));
    }




    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'phone_number' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }


        $item = new Contractor();
        $item->name = $request->name;
        $item->phone_number = $request->phone_number;
        $item->address = $request->address;

        $item->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'Contractor details saved successfully.');
        return back()->withInput();
    }


    public function viewContractor(Request $request, $id)
    {
        if ($id) {
            $item = Contractor::where('id', '=', $id)->first();
            $shops = Shop::all();
            return view('poultry/updateContractor', compact('item', 'shops'));
        }
        Session::flash('status', "error");
        Session::flash('status-message', "No contractor found with given id:" . $id);
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
            $item = Contractor::where('id', '=', $request->id)->first();
            if ($request->name) {
                $item->name = $request->name;
            }

            if ($request->phone_number) {
                $item->phone_number = $request->phone_number;
            }

            if ($request->address) {
                $item->address = $request->address;
            }

            if ($request->shops) {
                if (!empty($request->shops)) {
                    //delete all previous pivots
                    $pivots = ShopContractorPivot::where("contractor_id", $item->id);
                    $pivots->delete();
                    //save all pivots.
                    foreach ($request->shops as $shop) {
                        $pivot = ShopContractorPivot::where("shop_id", $shop)
                            ->where("contractor_id", $item->id)->first();
                        if ($pivot === null) {
                            $pivot = ShopContractorPivot::create([
                                "shop_id" => $shop,
                                "contractor_id" => $item->id
                            ]);
                        }
                    }
                }
            }

            $item->save();
            Session::flash('status', "success");
            Session::flash('status-message', 'Contractor details updated successfully.');
            return back()->withInput();
        }

        Session::flash('status', "error");
        Session::flash('status-message', "No contractor found with given id:" . $request->id);
        return back()->withInput();
    }



    public function report(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $items = Contractor::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $items = Contractor::all();
        }
        return view('poultry/contractorsReport', compact('items'));
    }



    public function ledger(Request $request, $id)
    {
        if ($id) {
            $contractor = Contractor::where('id', '=', $id)->first();

            $items = null;
            $payments = ContractorPayment::where("contractor_id", $contractor->id)
                ->orderBy("created_at", "ASC")->get();

            $shops = $contractor->shops;
            foreach ($shops as $shop) {
                $collections = Collection::where("shop_id", $shop->id)
                    ->orderBy("created_at", "ASC")->get();
                $items = $payments->concat($collections)->sortBy('created_at');
            }

            //return $items;

            return view('poultry/contractorDetails', compact('contractor', 'items'));
        }
        Session::flash('status', "error");
        Session::flash('status-message', "No shop found with given id:" . $id);
        return back()->withInput();
    }
}
