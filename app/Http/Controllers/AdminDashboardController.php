<?php

namespace App\Http\Controllers;

use App\Models\AppointmentFocus;
use App\Models\DJ;
use App\Models\Event;
use App\Models\EventPlanningEssential;
use App\Models\Meeting;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Models\Song;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){

        $users=User::latest()
        ->whereHas('roles',function($q){
            $q->where('name','user');
        })
        ->count();

        $djs=DJ::latest()->count();

        $songs=Song::count();

        $eventPlanningEssentials=EventPlanningEssential::latest()->count();

        $services=Service::latest()->count();

        $servicesRequests=ServiceRequest::latest()->count();

        $staffs=Staff::latest()->count();
        $events=Event::latest()->count();
        $appointmentFocuses=AppointmentFocus::latest()->count();
        $meetings=Meeting::latest()->count();


        return view('dashboard',compact('users','djs','songs','eventPlanningEssentials','services','servicesRequests','staffs','events','appointmentFocuses','meetings'));
    }
}
