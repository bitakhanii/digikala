<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('en_title')->unique()->nullable();
            $table->bigInteger('price');
            $table->integer('discount')->default(0);
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('guarantee')->nullable();
            $table->integer('weight')->default(0);
            $table->text('introduction')->nullable();
            $table->string('image');
            $table->integer('inventory');
            $table->integer('sold')->default(0);
            $table->integer('views')->default(0);
            $table->boolean('is_special')->default(0);
            $table->bigInteger('special_time')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
