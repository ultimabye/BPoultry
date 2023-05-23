<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Shop extends Model
{
    use HasFactory;

    protected $hidden = [
        'password',
        'remember_token',
        'laravel_through_key'
    ];



    public function totalCollections(): HasMany
    {
        return $this->hasMany(
            Collection::class,
            "shop_id",
            "id",
        );
    }



    public function allPayments(): HasMany
    {
        return $this->hasMany(
            ShopPayment::class,
            "shop_id",
            "id",
        );
    }



    public function getTotalBilled()
    {
        $totalCollection = $this->totalCollections;

        $totalAmount = 0;

        foreach ($totalCollection as $collection) {
            $totalAmount += $collection->rate->amount * $collection->collection_amount;
        }

        return $totalAmount;
    }



    public function getAmountPaid()
    {
        $payments = $this->allPayments;

        $totalPaid = 0;

        foreach ($payments as $payment) {
            $totalPaid += $payment->amount;
        }

        return $totalPaid;
    }



    public function getAmountDue()
    {
        $totalAmount = $this->getTotalBilled();
        $totalPaid = $this->getAmountPaid();
        $amountDue = $totalAmount - $totalPaid;

        return $amountDue;
    }
}
