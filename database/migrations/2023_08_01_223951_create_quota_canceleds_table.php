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
        Schema::create('quota_canceleds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('customer_canceled_id')->nullable();
            $table->unsignedBigInteger('administrator_id')->nullable();
            $table->integer('cli_old_id')->nullable();
            $table->string('group', 10)->nullable();
            $table->string('quota', 10)->nullable();
            $table->string('contract', 50)->unique();
            $table->string('consortium', 255)->nullable();
            $table->string('document', 20)->nullable();
            $table->date('purchase_date');
            $table->text('registry')->nullable();
            $table->text('book')->nullable();
            $table->text('sheets')->nullable();
            $table->enum('matriz', ['B', 'M'])->default('B');
            $table->enum('status', ['A', 'I'])->default('A');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('customer_canceled_id')->references('id')->on('canceled_customers');
            $table->foreign('administrator_id')->references('id')->on('administrators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quota_canceleds');
    }
};
