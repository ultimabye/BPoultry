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
        Schema::create('sales', function (Blueprint $table) {
            $table->unsignedBigInteger("id")->primary();

            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')
                ->references("id")
                ->on("products");

            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references("id")
                ->on("customers");

            $table->float('price_per_unit')->default(0.0);
            $table->float('freight_charges')->default(0.0);
            $table->float('amount_due')->default(0.0);
            $table->integer('discount')->default(0);
            $table->integer('quantity');
            $table->unsignedBigInteger('date')->default(0);
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
        Schema::dropIfExists('sales');
    }
};
