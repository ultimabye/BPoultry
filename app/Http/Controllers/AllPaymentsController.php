<?php

namespace App\Http\Controllers;

use App\Models\ContractorPayment;
use App\Models\ShopPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AllPaymentsController extends Controller
{
    public function index(Request $request)
    {
        $shopPayments = ShopPayment::orderBy("entry_date", "ASC")->get();

        $contractorPayments = ContractorPayment::orderBy("entry_date", "ASC")->get();

        $items = $shopPayments->concat($contractorPayments)->sortBy('entry_date');;

        return view('poultry/payments', compact('items'));
    }



    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|min:1|max:255',
            'amount' => 'required|numeric',
            'type' => 'required|string|min:1|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }

        if ($request->type == "shop") {
            $shopPayment = ShopPayment::where("id", $request->id)->first();
            if ($shopPayment != null) {
                $shopPayment->amount = $request->amount;
                $shopPayment->save();
                Session::flash('status', "success");
                Session::flash('status-message', 'Payment updated successfully.');
                return back()->withInput();
            }
        } else if ($request->type == "contractor") {
            $contractorPayment = ContractorPayment::where("id", $request->id)->first();
            if ($contractorPayment != null) {
                $contractorPayment->amount = $request->amount;
                $contractorPayment->save();
                Session::flash('status', "success");
                Session::flash('status-message', 'Payment updated successfully.');
                return back()->withInput();
            }
        }

        Session::flash('status', "error");
        Session::flash('status-message', "No payment found with given id:" . $request->id);
        return back()->withInput();
    }



    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|min:1|max:255',
            'type' => 'required|string|min:1|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }

        if ($request->type == "shop") {
            $shopPayment = ShopPayment::where("id", $request->id)->first();
            if ($shopPayment != null) {
                $shopPayment->delete();
                Session::flash('status', "success");
                Session::flash('status-message', 'Payment deleted successfully.');
                return back()->withInput();
            }
        } else if ($request->type == "contractor") {
            $contractorPayment = ContractorPayment::where("id", $request->id)->first();
            if ($contractorPayment != null) {
                $contractorPayment->delete();
                Session::flash('status', "success");
                Session::flash('status-message', 'Payment deleted successfully.');
                return back()->withInput();
            }
        }

        Session::flash('status', "error");
        Session::flash('status-message', "No payment found with given id:" . $request->id);
        return back()->withInput();
    }
}
