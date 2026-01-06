<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('id_mahasiswa');
            $table->string('nim');
            $table->string('nama_mahasiswa');
            $table->unsignedBigInteger('prodi'); //foreign key prodi
            $table->unsignedBigInteger('fakultas'); //foreign key fakultas
            $table->string('email');
            $table->string('no_hp');
            $table->timestamps();

            $table->foreign('prodi')->references('id_prodi')->on('prodis')->onDelete('cascade');
            $table->foreign('fakultas')->references('id_fakultas')->on('fakultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
