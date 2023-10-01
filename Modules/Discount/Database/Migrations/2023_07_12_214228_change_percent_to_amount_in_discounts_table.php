<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            /*$table->dropColumn('percent');
            $table->addColumn('bigInteger', 'amount')->after('code');*/
            DB::statement('ALTER TABLE discounts CHANGE percent amount bigInt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discounts', function (Blueprint $table) {
            /*$table->dropColumn('amount');
            $table->addColumn('integer', 'percent')->after('code');*/
            DB::statement('ALTER TABLE discounts CHANGE amount percent int');
        });
    }
};
