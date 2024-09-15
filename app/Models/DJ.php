<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DJ extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    protected $table='d_js';

    public function songs(){
        return $this->hasMany(Song::class);
    }
}
