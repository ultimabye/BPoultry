<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;


    public function rate()
    {
        return $this->hasOne(
            Rate::class,
            "id",
            "rate_id"
        );
    }
}
