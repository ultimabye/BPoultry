<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Rate;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

class CollectionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'shop_id' => 'required|integer',
            'driver_id' => 'required|integer',
            'collection_amount' => 'required|integer'
        ]);


        $shop = Shop::where("id", $request->shop_id)->first();
        if ($shop) {
            $item = new Collection();
            $item->shop_id = $request->shop_id;
            $item->driver_id = $request->shop_id;
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
}
