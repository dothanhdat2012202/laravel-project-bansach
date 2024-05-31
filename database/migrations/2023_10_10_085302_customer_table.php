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
            $table->string('customer_name',50);
            $table->string('customer_phone',20)->nullable();
            $table->string('customer_gmail',20)->nullable();
            $table->string('customer_password',20)->nullable();
            $table->boolean('customer_gender')->nullable();
            $table->dateTime('customer_birthday')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('customers');
    }
};
