<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryFoto extends Model
{
    use HasFactory;
    protected $table = 'galery_foto';
    protected $fillable = [
        'foto',
        'nama',
        'description',

    ];
}
