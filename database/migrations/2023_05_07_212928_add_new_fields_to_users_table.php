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
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile')->nullable()->after('password');
            $table->date('dob')->nullable()->after('mobile');
            $table->enum('sex' , ['female' , 'male'])->nullable()->after('dob');
            $table->string('area_code')->nullable()->after('sex');
            $table->string('phone')->nullable()->after('area_code');
            $table->text('address')->nullable()->after('phone');
            $table->string('national_code')->nullable()->after('address');
            $table->string('credit_card')->nullable()->after('national_code');
            $table->boolean('newsletter')->default(0)->after('credit_card');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('dob');
            $table->dropColumn('sex');
            $table->dropColumn('area_code');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('national_code');
            $table->dropColumn('credit_card');
            $table->dropColumn('newsletter');
        });
    }
};
