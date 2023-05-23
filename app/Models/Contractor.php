<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use function PHPUnit\Framework\isNull;

class Contractor extends Model
{
    use HasFactory;


    public function shops(): HasManyThrough
    {
        return $this->hasManyThrough(
            Shop::class,
            ShopContractorPivot::class,
            "contractor_id",
            "id",
            "id",
            "shop_id"
        );
    }


    public function isManagingShop($shopId): bool
    {
        info("searching for shop=" . $shopId . "contactor=" . $this->id);
        $pivot = ShopContractorPivot::where("shop_id", $shopId)
            ->where("contractor_id", $this->id)->first();
        //info("pivot for " . $pivot->shop_id);
        if ($pivot != null) {
            info("found for shop=" . $shopId . "contactor=" . $this->id);
            return true;
        }
        return false;
    }
}
