<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

    public function appointmentFocus(){
        return $this->belongsTo(AppointmentFocus::class)->withDefault();
    }
}
