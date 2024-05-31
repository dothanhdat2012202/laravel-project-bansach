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
        // Schema::create('category',function (Blueprint $table)
        // {
        //     $table->id('category_id');
        //     $table->string('category_name',50);
        //     $table->timestamps();
        //     $table->foreign('category_id')->references('category_id')->on('books');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::drop('category');
    }
};
