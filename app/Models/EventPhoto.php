<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'foto'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
