<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;
    protected $table = 'matches';

    // Definisikan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'club1_id',
        'club2_id',
        'score1',
        'score2',
    ];

    // Definisikan relasi dengan klub (clubs)
    public function club1()
    {
        return $this->belongsTo(Club::class, 'club1_id');
    }

    public function club2()
    {
        return $this->belongsTo(Club::class, 'club2_id');
    }
}
