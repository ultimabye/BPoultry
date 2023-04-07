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

            $table->integer('quantity');
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
