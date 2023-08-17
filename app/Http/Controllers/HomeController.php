<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = new CollectionData();

        $yesterday = Carbon::yesterday();
        $yesterday->hour = 15;
        $yesterday->minute = 59;
        $yesterday->second = 59;


        $today = Carbon::today();
        $today->hour = 15;
        $today->minute = 59;
        $today->second = 59;


        $todaysCollections = Collection::whereBetween('created_at', [$yesterday, $today])
            ->orderBy("created_at", "DESC")->get();


        $data->todaysCollection = $todaysCollections;

        $totalToday = 0;
        foreach ($todaysCollections as $tCollection) {
            $totalToday += $tCollection->collection_amount;
        }

        $data->drivers = User::where("is_admin", false)->get();

        $data->totalToday = $totalToday;
        return view('index2', compact("data"));
    }
}
