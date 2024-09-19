<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class EventPlanningEssential extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $appends=[
        "video_url",
    ];

    public function getVideoUrlAttribute(){
        return $this->video_path ? Storage::url($this->video_path) : null;
    }


}
