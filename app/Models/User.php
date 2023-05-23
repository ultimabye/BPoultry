<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function shops(): HasManyThrough
    {
        return $this->hasManyThrough(
            Shop::class,
            ShopDriverPivot::class,
            "driver_id",
            "id",
            "id",
            "shop_id"
        );
    }


    public function isHandlingShop($shopId): bool
    {
        info("searching for shop=" . $shopId . "driver=" . $this->id);
        $pivot = ShopDriverPivot::where("shop_id", $shopId)
            ->where("driver_id", $this->id)->first();
        //info("pivot for " . $pivot->shop_id);
        if ($pivot != null) {
            info("found for shop=" . $shopId . "driver=" . $this->id);
            return true;
        }
        return false;
    }
}
