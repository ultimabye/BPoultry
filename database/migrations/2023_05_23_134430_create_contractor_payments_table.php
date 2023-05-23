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
        Schema::create('contractor_payments', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger("contractor_id");

            $table->foreign("contractor_id")
                ->references("id")
                ->on("contractors")
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
        Schema::dropIfExists('contractor_payments');
    }
};
