<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Standings extends Model
{
    protected $table = 'standings';
    protected $fillable = ['club_id', 'played', 'won', 'drawn', 'lost', 'goals_for', 'goals_against', 'points'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
