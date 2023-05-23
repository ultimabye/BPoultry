<?php

namespace App\Http\Controllers;

use App\Models\ContractorPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContractorPaymentController extends Controller
{
    public function store(Request $request)
    {
        if ($request->type == "cash") {
            $validator = Validator::make($request->all(), [
                'amount' => 'required|integer',
                'type' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                Session::flash('status', "error");
                Session::flash('status-message', $validator->messages()->first());
                return back()->withInput();
            }
        } else if ($request->type == "cheque") {
            $validator = Validator::make($request->all(), [
                'amount' => 'required|integer',
                'type' => 'required|string|max:255',
                'cheque_no' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                Session::flash('status', "error");
                Session::flash('status-message', $validator->messages()->first());
                return back()->withInput();
            }
        } else {
            Session::flash('status', "error");
            Session::flash('status-message', "Unknown error!");
            return back()->withInput();
        }



        $item = new ContractorPayment();
        $item->cheque_no = $request->cheque_no;
        $item->amount = $request->amount;
        $item->type = $request->type;
        $item->description = $request->description;
        $item->save();

        Session::flash('status', "success");
        Session::flash('status-message', 'Payment saved successfully.');
        return back()->withInput();
    }
}
