<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->search;
        if ($query) {
            $items = Expense::where('name', 'like', '%' . $query . '%')->get();
        } else {
            $items = Expense::all();
        }

        return view('allExpenses', compact('items'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'amount' => 'required|integer',
            'date' => 'required|date'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }


        $date = new DateTime($request->date);

        $item = new Expense();
        $item->name = $request->name;
        $item->amount = $request->amount;
        $item->date = $date->getTimestamp();
        if ($request->description) {
            $item->description = $request->description;
        }
        $item->save();
        Session::flash('status', "success");
        Session::flash('status-message', 'New expense saved successfully.');
        return back()->withInput();
    }
}
