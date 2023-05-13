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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 40);
            $table->string('last_name', 80);
            $table->date('date_of_birth')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('email', 120)->unique();
            $table->string('bank_account_number', 32)->index()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->fullText(['first_name', 'last_name']);
            $table->unique(['first_name', 'last_name', 'date_of_birth'], 'first_last_dob_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};