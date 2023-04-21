<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
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


    public function sale()
    {
        return $this->hasOne(
            Sale::class,
            "id",
            "sale_id"
        );
    }
}
