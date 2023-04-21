<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    public $incrementing = false;
    

    public function product()
    {
        return $this->hasOne(
            Product::class,
            "id",
            "product_id"
        );
    }


    public function supplier()
    {
        return $this->hasOne(
            Supplier::class,
            "id",
            "supplier_id"
        );
    }


    public function customer()
    {
        return $this->hasOne(
            Customer::class,
            "id",
            "customer_id"
        );
    }
}
