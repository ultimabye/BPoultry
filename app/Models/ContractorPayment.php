<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractorPayment extends Model
{
    use HasFactory;

    public function isCollection()
    {
        return false;
    }



    public function contractor()
    {
        return $this->hasOne(
            Contractor::class,
            "id",
            "contractor_id"
        );
    }


    public function getBeneficiaryName()
    {
        return $this->contractor->name;
    }


    public function getType()
    {
        return "contractor";
    }
}
