<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{

    public function handleOutboundPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer',
            'bank_acc_id' => 'required|string|max:255',
            'voucher_no' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }



        $item = new Payment();
        $item->voucher_no = $request->voucher_no;
        $item->amount = $request->amount;
        $item->type = $request->type;
        $item->description = $request->description;
        $item->save();

        $purchase = Purchase::where("id", "=", $request->voucher_no)->first();
        if ($purchase) {
            $purchase->amount_due = $purchase->amount_due - $item->amount;
            $purchase->save();
        }

        $bankAcc = BankAccount::where("id", "=", $request->bank_acc_id)->first();
        if ($bankAcc) {
            $bankAcc->balance = $bankAcc->balance - $item->amount;
            $bankAcc->save();
        }

        Session::flash('status', "success");
        Session::flash('status-message', 'Payment saved successfully.');
        return back()->withInput();
    }



    public function handleInboundPayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer',
            'bank_acc_id' => 'required|string|max:255',
            'voucher_no' => 'required|string|max:255',
            'description' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }



        $item = new Payment();
        $item->voucher_no = $request->voucher_no;
        $item->amount = $request->amount;
        $item->type = $request->type;
        $item->description = $request->description;
        $item->save();

        $sale = Sale::where("id", "=", $request->voucher_no)->first();
        if ($sale) {
            $sale->amount_due = $sale->amount_due - $item->amount;
            $sale->save();
        }

        $bankAcc = BankAccount::where("id", "=", $request->bank_acc_id)->first();
        if ($bankAcc) {
            $bankAcc->balance = $bankAcc->balance + $item->amount;
            $bankAcc->save();
        }

        Session::flash('status', "success");
        Session::flash('status-message', 'Payment saved successfully.');
        return back()->withInput();
    }
}
