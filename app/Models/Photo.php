<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $fillable = [
        'judul_foto',
        'deskipsi',
        'lokasi_file',
        'album_id',
        'user_id',


    ];
}
