<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status', ['unpaid', 'paid', 'processing', 'posted', 'received', 'canceled'])->charset('utf8')->collation('utf8_persian_ci')->change();
            $table->dropColumn('refund');
            DB::statement('ALTER TABLE orders CHANGE tracking_code tracking_serial VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_persian_ci');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('status')->change();
            $table->bigInteger('refund')->default(0)->after('pay_gateway');
            DB::statement('ALTER TABLE orders CHANGE tracking_serial tracking_code VARCHAR(255)');
        });
    }
};
