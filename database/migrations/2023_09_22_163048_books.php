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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('author',20)->nullable();
            $table->string('category_id',10)->nullable();
            $table->string('publish_id',10)->nullable();
            $table->string('input_price')->nullable();
            $table->string('output_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('book_pages')->nullable();
            $table->string('weight')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('books');
    }
};
