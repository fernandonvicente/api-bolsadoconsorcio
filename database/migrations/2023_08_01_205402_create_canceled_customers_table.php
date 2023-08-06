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
        Schema::create('canceled_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('cli_old_id')->nullable();
            $table->string('social_reason', 255)->nullable();
            $table->string('company', 255)->nullable();
            $table->string('cnpj', 20)->unique();
            $table->string('name', 255)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->text('website')->nullable();
            $table->text('facebook')->nullable();
            $table->text('logo')->nullable();
            $table->text('logo_website')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->float('car_commission', 8, 2);
            $table->float('immobile_commission', 8, 2);
            $table->float('truck_commission', 8, 2);
            $table->string('code_cli_iugu', 255)->unique();
            $table->enum('status', ['A', 'I', 'B'])->default('A');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canceled_customers');
    }
};
