<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopContractorPivot extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        "shop_id",
        "contractor_id"
    ];
}
