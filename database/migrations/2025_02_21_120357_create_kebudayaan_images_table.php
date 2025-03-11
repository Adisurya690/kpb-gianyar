<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('kebudayaan_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kebudayaan_id')->constrained()->onDelete('cascade'); // Relasi ke kebudayaan
            $table->string('path'); // Path gambar
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('kebudayaan_images');
    }
};
