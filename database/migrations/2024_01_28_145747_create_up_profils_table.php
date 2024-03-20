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
        Schema::create('up_profils', function (Blueprint $table) {
            $table->id();
            $table->string('idUser');
            $table->text('avatar')->nullable();
            $table->text('background')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('up_profils');
    }
};
