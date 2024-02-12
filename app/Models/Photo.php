<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryFoto extends Model
{
    use HasFactory;
    protected $table = 'photo';
    protected $fillable = [
        'foto',
        'nama',
        'description',

    ];
}
