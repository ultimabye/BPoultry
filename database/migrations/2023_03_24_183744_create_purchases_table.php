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
            $table->unsignedBigInteger("id")->primary();

            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')
                ->references("id")
                ->on("products");

            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')
                ->references("id")
                ->on("sales");

            $table->integer('quantity');
            $table->double('price_per_unit');
            $table->integer('discount')->default(0);
            $table->double('freight_charges')->default(0);
            $table->double('amount_due')->default(0);
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
