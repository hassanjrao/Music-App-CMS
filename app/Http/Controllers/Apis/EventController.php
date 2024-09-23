<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Resources\Event as ResourcesEvent;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){

        $events=Event::latest()
        ->where('is_active',1)
        ->get();


        $events=ResourcesEvent::collection($events);

        return response()->json([
            'data'=>[
                'events'=>$events
            ]
        ]);
    }
}
