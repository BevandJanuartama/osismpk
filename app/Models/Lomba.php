<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lomba extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'nama_lomba',
        'link_pendaftaran',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
