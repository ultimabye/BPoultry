<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Payment;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $purchase = Purchase::where('id', '=', $query)->first();
            if ($purchase) {
                $banks = BankAccount::all();
                return view('outBoundPayment', compact("purchase", "banks"));
            } else {
                $sale = Sale::where('id', '=', $query)->first();
                if ($sale) {
                    $banks = BankAccount::all();
                    return view('inBoundPayment', compact("sale", "banks"));
                } else {
                    Session::flash('status', "error");
                    Session::flash('status-message', "Voucher not found!");
                    return back()->withInput();
                }
            }
        }

        $payments = Payment::all();
        return view('searchVoucher', compact('payments'));
    }



    public function prepareInboundPayment(Request $request, $id)
    {
        $sale = Sale::where('id', '=', $id)->first();
        if ($sale) {
            $banks = BankAccount::all();
            return view('inBoundPayment', compact("sale", "banks"));
        }

        Session::flash('status', "error");
        Session::flash('status-message', "Voucher not found!");
        return back()->withInput();
    }



    public function prepareOutboundPayment(Request $request, $id)
    {
        $purchase = Purchase::where('id', '=', $id)->first();
        if ($purchase) {
            $banks = BankAccount::all();
            return view('outBoundPayment', compact("purchase", "banks"));
        }

        Session::flash('status', "error");
        Session::flash('status-message', "Voucher not found!");
        return back()->withInput();
    }
}
