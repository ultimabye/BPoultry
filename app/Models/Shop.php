<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Shop extends Model
{
    use HasFactory;

    protected $hidden = [
        'password',
        'remember_token',
        'laravel_through_key'
    ];


    public function contractor(): HasOneThrough
    {
        return $this->hasOneThrough(
            Contractor::class,
            ShopContractorPivot::class,
            "shop_id",
            "id",
            "id",
            "contractor_id"
        );
    }



    public function driver(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            ShopDriverPivot::class,
            "shop_id",
            "id",
            "id",
            "driver_id"
        );
    }




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



    public function rates(): HasMany
    {
        return $this->hasMany(
            Rate::class,
            "shop_id",
            "id",
        )->orderBy('updated_at', 'DESC');
    }




    public function latestRate()
    {
        return $this->rates()->first()->amount;
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



    public function getTotalBilledTill($date)
    {
        $totalCollection = $this->totalCollections()->where("created_at", "<=", $date)->get();

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


    public function getAmountPaidTill($date)
    {
        $payments = $this->allPayments()->where("created_at", "<=", $date)->get();;

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



    public function getAmountDueTill($date)
    {
        $totalAmount = $this->getTotalBilledTill($date);
        $totalPaid = $this->getAmountPaidTill($date);
        $amountDue = $totalAmount - $totalPaid;

        return $amountDue;
    }
}
