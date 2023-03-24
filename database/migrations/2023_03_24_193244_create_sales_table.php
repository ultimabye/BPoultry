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
            $table->id();

            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')
                ->references("id")
                ->on("products");

            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')
                ->references("id")
                ->on("customers");

            $table->bigInteger('supplier_id')->unsigned();
            $table->foreign('supplier_id')
                ->references("id")
                ->on("suppliers");

            $table->string('sale_price');
            $table->string('amount_due');
            $table->string('discount');
            $table->string('quantity');
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
