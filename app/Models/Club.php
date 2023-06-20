<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $table = 'clubs';

    // Definisikan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'name',
        'city',
        'ma',
        'me',
        's',
        'k',
        'gm',
        'gk',
        'point',
    ];

    // Definisikan relasi dengan pertandingan (matches)
    public function matches()
    {
        return $this->hasMany(Matche::class);
    }
}
