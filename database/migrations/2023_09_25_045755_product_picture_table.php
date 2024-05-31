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
        Schema::create('product_images', function (Blueprint $table) {
            $table->integer('id')->nullable(); // Cột id không tự động tăng và cho phép null
            $table->string('tenFileAnh', 50)->nullable();
            $table->string('Vitri', 20)->nullable();
            $table->timestamps();
            $table->foreign('product_images.id')->references('id')->on('books'); // Thiết lập khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
