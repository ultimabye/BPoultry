<?php

namespace App\Http\Controllers;

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
                return view('payAmount', compact("purchase"));
            } else {
                $sale = Sale::where('id', '=', $query)->first();
                return view('payAmount', compact("sale"));
            }
        }



        Session::flash('status', "error");
        Session::flash('status-message', "Voucher not found!");
        //return back()->withInput();
        return view('searchVoucher');
    }
}
