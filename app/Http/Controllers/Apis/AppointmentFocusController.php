<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\AppointmentFocus;
use Illuminate\Http\Request;

class AppointmentFocusController extends Controller
{
    public function index(){
        $appointmentFocuses=AppointmentFocus::latest()->get();
        return response()->json([
            'data'=>[
                'appointment_focuses'=>$appointmentFocuses
            ]
        ]);
    }
}
