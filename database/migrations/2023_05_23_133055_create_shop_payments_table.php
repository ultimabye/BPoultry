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
        Schema::create('shop_payments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("shop_id");

            $table->foreign("shop_id")
                ->references("id")
                ->on("shops")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text("cheque_no")->nullable();
            $table->unsignedBigInteger("amount");
            $table->text("type");
            $table->text("description")->nullable();
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
        Schema::dropIfExists('shop_payments');
    }
};
