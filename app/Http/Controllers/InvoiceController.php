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
                return view('customerInvoice', compact(
                    'purchase',
                ));
            }
        }

        Session::flash('status', "error");
        Session::flash('status-message', 'Failed to print invoice, unknown error.');
        return back()->withInput();


        return $orderId;
        $query = $request->search;
        if ($query) {
            $sales = Sale::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $sales = Sale::all();
        }

        $totalAmount = 0;
        $amountDue = 0;

        foreach ($sales as $item) {
            $totalAmount += ($item->quantity * $item->product->unit_price) - (($item->quantity * $item->product->unit_price) / 100 * $item->discount);
            $totalAmount += $item->freight_charges;

            $amountDue += $item->amount_due;
        }

        $amountReceived = $totalAmount - $amountDue;

        return view('customerInvoice', compact(
            'sales',
            'totalAmount',
            'amountReceived',
            'amountDue'
        ));
    }
}
