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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')
                ->references("id")
                ->on("products");

            $table->bigInteger('sale_id')->unsigned();
            $table->foreign('sale_id')
                ->references("id")
                ->on("sales");

            $table->integer('quantity');
            $table->integer('price_per_unit');
            $table->integer('discount')->default(0);
            $table->bigInteger('freight_charges')->default(0);
            $table->bigInteger('amount_due')->default(0);
            $table->unsignedBigInteger("date")->default(0);

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
        Schema::dropIfExists('purchases');
    }
};
