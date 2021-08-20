<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable=[
        "song",
        "album_id",
        "title",
        "genre_id",
        "image",
        "artwork_url",
        "description",
        "dj_name",
        "streaming_url",
        "duration",
        "explicit_lyrics",
        "song_played",
        "private",
        "published_at"
    ];

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
