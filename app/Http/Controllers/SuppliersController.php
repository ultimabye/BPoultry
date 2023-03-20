<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SuppliersController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:1|max:255',
            'number' => 'required|string|max:255',
            'address' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Session::flash('status', $validator->messages()->first());
            return back()->withInput();
        }



        $post = new Supplier();
        $post->name = $request->name;
        $post->number = $request->number;
        $post->address = $request->address;
        $post->save();
        return back()->with('status', 'New Supplier saved successfully.');
    }
}
