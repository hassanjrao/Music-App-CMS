<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=[
        "artwork_url",
        "streaming_url",
        'song_url',
        'thumbnail_url'
    ];

    public function getThumbnailUrlAttribute(){
        return $this->thumbnail ? Storage::url($this->thumbnail) : null;
    }

    public function getArtworkUrlAttribute(){
        return $this->image ? Storage::url($this->image) : null;
    }

    public function getStreamingUrlAttribute(){
        return $this->song ? Storage::url($this->song) : null;
    }

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function dj(){
        return $this->belongsTo(DJ::class,'dj_id')->withDefault();
    }
}
