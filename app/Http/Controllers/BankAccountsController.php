<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BankAccountsController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $items = BankAccount::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $items = BankAccount::all();
        }

        return view('allBanks', compact('items'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'account_title' => 'required|string|min:1|max:255',
            'bank_name' => 'required|string|max:255',
            'balance' => 'required|integer'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }



        $item = new BankAccount();
        $item->account_title = $request->account_title;
        $item->bank_name = $request->bank_name;
        $item->balance = $request->balance;
        $item->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'New Bank Account saved successfully.');
        return back()->withInput();
    }
}
