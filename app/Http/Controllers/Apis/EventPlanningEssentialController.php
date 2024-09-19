<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventPlanningEssential as ResourcesEventPlanningEssential;
use App\Models\EventPlanningEssential;
use Illuminate\Http\Request;

class EventPlanningEssentialController extends Controller
{
    public function listing()
    {
        $eventPlanningEssentials = EventPlanningEssential::latest()->get();

        $eventPlanningEssentials=ResourcesEventPlanningEssential::collection($eventPlanningEssentials);

        return response([
            'data' => [
                'event_planning_essentials' => $eventPlanningEssentials
            ]
        ]);
    }
}
