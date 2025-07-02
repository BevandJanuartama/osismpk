<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'divisi'; // Biasanya Laravel pakai plural, sesuaikan jika di migration kamu pakai 'divisi'

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_divisi',
        'foto',
    ];

    // Relasi one-to-many: satu divisi punya banyak anggota
    public function anggotas()
    {
        return $this->hasMany(Anggota::class, 'id_divisi');
    }
}
