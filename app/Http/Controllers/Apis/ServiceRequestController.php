<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function create(Request $request){

        $request->validate([
            'service_id'=>'required|exists:services,id',
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
        ]);

        $serviceRequest=ServiceRequest::create([
            'service_id'=>$request->service_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        return response()->json([
            'message'=>'Submitted Successfully, We will get back to you soon',
            'data'=>[
                'service_request'=>$serviceRequest
            ]
        ]);

    }
}
