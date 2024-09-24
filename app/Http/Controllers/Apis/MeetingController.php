<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    public function index(){

        $meetings=Meeting::latest()->get();

        $meetings=$meetings->map(function($meeting){

            // format: Tue, 27 August
            $date=$meeting->date ? date('D, d F',strtotime($meeting->date)) : null;
            // format: 12:00 PM
            $time=$meeting->time ? date('h:i A',strtotime($meeting->time)) : null;

            return [
                'id'=>$meeting->id,
                'appointment_focus'=>$meeting->appointmentFocus,
                'date'=>$date,
                'time'=>$time,
                'user'=>$meeting->user
            ];
        });

        return response([
            'data'=>[
                'meetings'=>$meetings
            ]
        ]);

    }


    public function create(Request $request){

        $request->validate([
            'appointment_focus_id'=>'required|exists:appointment_focuses,id',
            'date'=>'required|date',
            'time'=>'required|date_format:H:i',
        ]);

       $meeting= Meeting::create([
            'appointment_focus_id'=>$request->appointment_focus_id,
            'date'=>$request->date,
            'time'=>$request->time,
            'user_id'=>auth()->id()
        ]);

        return response([
            'message'=>'Meeting scheduled successfully',
            'data'=>[
                'meeting'=>$meeting
            ]
        ]);

    }
}
