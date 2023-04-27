<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function index(Request $request, $orderId, $invoiceType)
    {
        if ($orderId) {

            $purchase = Purchase::where('id',  $orderId)->first();
            if ($invoiceType === "customer") {
                return view('customerInvoice', compact(
                    'purchase',
                ));
            } else if ($invoiceType === "supplier") {
                return view('supplierInvoice', compact(
                    'purchase',
                ));
            } else {
                Session::flash('status', "error");
                Session::flash('status-message', 'Failed to print invoice, unknown error.');
                return back()->withInput();
            }
        }

        Session::flash('status', "error");
        Session::flash('status-message', 'Failed to print invoice, unknown error.');
        return back()->withInput();
    }



    public function prepareForPrint(Request $request, $orderId)
    {
        if ($orderId) {
            $purchase = Purchase::where('id',  $orderId)->first();
            if ($purchase) {
                return view('invoiceDetails', compact(
                    'purchase',
                ));
            }
        }

        Session::flash('status', "error");
        Session::flash('status-message', 'Failed to print invoice, unknown error.');
        return back()->withInput();
    }
}
