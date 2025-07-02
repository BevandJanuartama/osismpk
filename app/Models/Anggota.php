<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'anggota';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'id_divisi'
    ];

    // Relasi ke model Divisi (Many to One)
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi');
    }
}
