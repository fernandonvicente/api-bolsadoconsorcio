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
        Schema::create('canc_cust_institutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('customer_canceled_id')->unique();
            $table->text('email')->nullable();
            $table->text('who_we_are')->nullable();
            $table->text('welcome')->nullable();
            $table->text('want_to_buy')->nullable();
            $table->text('want_to_sell')->nullable();
            $table->text('animation_text_01')->nullable();
            $table->text('animation_text_02')->nullable();
            $table->text('animation_text_03')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('customer_canceled_id')->references('id')->on('canceled_customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canc_cust_institutions');
    }
};
