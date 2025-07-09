<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisiTable extends Migration
{
    // Fungsi up() untuk membuat tabel 'divisi'
    public function up()
    {
        Schema::create('divisi', function (Blueprint $table) {
            $table->id();                       // Kolom ID (primary key)
            $table->string('nama_divisi');     // Nama divisi (contoh: Inti OSIS, Agama, Humas, dll)
            $table->string('foto')->nullable(); // Kolom foto (opsional)
            $table->timestamps();              // Kolom created_at & updated_at
        });
    }

    // Fungsi down() untuk menghapus tabel 'divisi'
    public function down()
    {
        Schema::dropIfExists('divisi');
    }
}
