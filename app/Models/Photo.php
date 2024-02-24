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
        'deskripsi',
        'lokasi_file',
        'album_id',
        'user_id'
    ];
    /**
     * Get the user that owns the Photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the like for the Photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Like()
    {
        return $this->hasMany(Like::class, 'foto_id');
    }
    /**
     * Get all of the comment for the Photo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Comment()
    {
        return $this->hasMany(Comment::class, 'foto_id');
    }
}
