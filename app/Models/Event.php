<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'tanggal_mulai',
        'tanggal_selesai',
        'link_drive',
        'deskripsi',
        'status',
    ];

    public function photos()
    {
        return $this->hasMany(EventPhoto::class);
    }

    public function lombas()
    {
        return $this->hasMany(Lomba::class);
    }
}
