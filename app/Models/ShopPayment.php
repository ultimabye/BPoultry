<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopPayment extends Model
{
    use HasFactory;


    public function isCollection()
    {
        return false;
    }


    public function shop()
    {
        return $this->hasOne(
            Shop::class,
            "id",
            "shop_id"
        );
    }


    public function getBeneficiaryName()
    {
        return $this->shop->name;
    }

    public function getType()
    {
        return "shop";
    }
}
