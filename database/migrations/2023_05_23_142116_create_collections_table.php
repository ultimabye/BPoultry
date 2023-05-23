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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();

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


            $table->unsignedBigInteger("rate_id");

            $table->foreign("rate_id")
                ->references("id")
                ->on("rates")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();


            $table->unsignedInteger("collection_amount");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collections');
    }
};
