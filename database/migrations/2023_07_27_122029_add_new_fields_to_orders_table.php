<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('discount_id')->nullable()->after('post_amount');
            $table->foreign('discount_id')->references('id')->on('discounts');
            $table->bigInteger('payable')->after('discount_id');
            $table->boolean('factor')->default(0)->after('pay_gateway');
            $table->boolean('call')->default(0)->after('factor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_discount_id_foreign');
            $table->dropColumn('discount_id');
            $table->dropColumn('payable');
            $table->dropColumn('factor');
            $table->dropColumn('call');
        });
    }
};
