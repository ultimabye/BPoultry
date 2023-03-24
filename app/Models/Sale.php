<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasOne(
            Product::class,
            "id"
        );
    }


    public function supplier()
    {
        return $this->hasOne(
            Supplier::class,
            "id"
        );
    }


    public function customer()
    {
        return $this->hasOne(
            Customer::class,
            "id"
        );
    }
}
