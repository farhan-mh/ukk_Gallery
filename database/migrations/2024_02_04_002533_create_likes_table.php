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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('upload_id');
            $table->timestamps();

            // Tambahkan indeks untuk kolom yang sering digunakan dalam kueri
            $table->index(['user_id', 'upload_id']);

            // Tambahkan kunci asing
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('upload_id')->references('id')->on('uploads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
