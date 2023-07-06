<?php

namespace App\Http\Controllers;

use App\Http\Resources\CollectionResource;
use App\Models\Collection;
use App\Models\Rate;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

class CollectionController extends Controller
{



    public function index()
    {

        $allCollections = Collection::orderBy("created_at", "DESC")->get();

        return view('poultry/allCollections', compact("allCollections"));
    }




    public function store(Request $request)
    {
        $request->validate([
            'shop_id' => 'required|integer',
            'driver_id' => 'required|integer',
            'collection_amount' => 'required|numeric'
        ]);


        $shop = Shop::where("id", $request->shop_id)->first();
        if ($shop) {
            $item = new Collection();
            $item->shop_id = $request->shop_id;
            $item->driver_id = $request->driver_id;
            $item->shop_id = $request->shop_id;
            $item->collection_amount = $request->collection_amount;

            $todaysRate = $shop->rates()->first();

            if ($todaysRate) {
                $item->rate_id = $todaysRate->id;
                $item->save();
                return $item;
            } else {
                throw new RuntimeException("Failed to find today's collection rate!");
            }
        }


        throw new RuntimeException("Shop associated with the request not found");
    }



    public function today(Request $request)
    {
        $todaysCollections = Collection::whereDate('created_at', Carbon::today())
            ->where("driver_id", Auth::user()->id)
            ->orderBy("created_at", "DESC")->get();
        return CollectionResource::collection($todaysCollections);
    }



    public function view(Request $request, $id)
    {
        if ($id) {
            $item = Collection::where('id', '=', $id)->with("driver")->first();
            return view('poultry/updateCollection', compact('item'));
        }
        Session::flash('status', "error");
        Session::flash('status-message', "No collection found with given id:" . $id);
        return back()->withInput();
    }



    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|string|min:1|max:255',
            'collection_amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            Session::flash('status', "error");
            Session::flash('status-message', $validator->messages()->first());
            return back()->withInput();
        }

        if ($request->id) {
            $item = Collection::where('id', '=', $request->id)->first();
            if ($request->collection_amount) {
                $item->collection_amount = $request->collection_amount;
            }

            $item->save();
            Session::flash('status', "success");
            Session::flash('status-message', 'Collection updated successfully.');
            return back()->withInput();
        }

        Session::flash('status', "error");
        Session::flash('status-message', "No shop found with given id:" . $request->id);
        return back()->withInput();
    }
}
