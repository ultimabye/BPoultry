<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionData extends Model
{
    use HasFactory;

    var $todaysCollection;

    var $totalToday;

    var $drivers;
}
