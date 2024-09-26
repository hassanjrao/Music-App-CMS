<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class DJ extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $table='d_js';

    protected $appends=['image_url'];

    public function getImageUrlAttribute(){
        return $this->image ? Storage::url($this->image) : null;
    }

    public function songs(){
        return $this->hasMany(Song::class);
    }
}
