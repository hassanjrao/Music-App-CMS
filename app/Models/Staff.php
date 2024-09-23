<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Staff extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='staffs';

    protected $guarded=[];

    protected $appends=['image_url'];

    public function getImageUrlAttribute(){
        return $this->image ? Storage::url($this->image) : null;
    }
}
