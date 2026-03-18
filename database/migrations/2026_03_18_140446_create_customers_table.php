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
            $table->char('document_number', 15)->unique();
            $table->char('first_name', 50);
            $table->char('last_name', 50);
            $table->char('address', 80)->nullable();
            $table->date('birthday')->nullable();
            $table->char('phone_number', 16)->nullable();
            $table->char('email', 100)->nullable();
            $table->timestamps();
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
