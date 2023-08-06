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
        Schema::create('canc_customers_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('customer_canceled_id')->unique();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('number', 10)->nullable();
            $table->string('complement', 255)->nullable();
            $table->string('neighborhood', 255)->nullable();
            $table->string('zip_code', 9)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('customer_canceled_id')->references('id')->on('canceled_customers');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canc_customers_addresses');
    }
};
