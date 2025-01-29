<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapor', function (Blueprint $table) {
            $table->id('id'); // ID laporan sebagai primary key
            $table->string('cultural_name'); // Nama kebudayaan
            $table->string('cultural_location'); // Lokasi kebudayaan
            $table->string('cultural_image'); // Gambar kebudayaan (path atau URL gambar)
            $table->text('cultural_description'); // Deskripsi kebudayaan
            $table->string('reporter'); // Pelapor
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lapor');
    }
}
