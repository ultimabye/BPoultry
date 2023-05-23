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
        Schema::create('shop_contractor_pivots', function (Blueprint $table) {
            $table->unsignedBigInteger("shop_id");

            $table->foreign("shop_id")
                ->references("id")
                ->on("shops")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger("contractor_id");

            $table->foreign("contractor_id")
                ->references("id")
                ->on("contractors")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->primary([
                "shop_id",
                "contractor_id"
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
        Schema::dropIfExists('shop_contractor_pivots');
    }
};
