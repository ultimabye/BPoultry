<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('contractor_payments', function (Blueprint $table) {
            $table->timestamp("entry_date")->useCurrent();
        });
        DB::statement("UPDATE contractor_payments SET entry_date = created_at");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contractor_payments', function (Blueprint $table) {
            $table->dropColumn("entry_date");
        });
    }
};
