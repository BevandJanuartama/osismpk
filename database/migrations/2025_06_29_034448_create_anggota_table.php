<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id(); // ID anggota sebagai primary key

            // Foreign key ke tabel 'divisi'
            $table->foreignId('id_divisi')->constrained('divisi')->onDelete('cascade');

            $table->string('nama');           // Nama anggota
            $table->string('jabatan');        // Jabatan: Koordinator / Anggota / Ketua
            $table->string('foto')->nullable(); // Path/URL foto (opsional)

            $table->timestamps();             // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
