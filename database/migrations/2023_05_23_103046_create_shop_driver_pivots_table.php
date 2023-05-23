<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_driver_pivots', function (Blueprint $table) {
            $table->unsignedBigInteger("shop_id");

            $table->foreign("shop_id")
                ->references("id")
                ->on("shops")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("driver_id");

            $table->foreign("driver_id")
                ->references("id")
                ->on("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary([
                "shop_id",
                "driver_id"
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_driver_pivots');
    }
};
