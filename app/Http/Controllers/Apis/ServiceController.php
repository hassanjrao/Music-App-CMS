<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){

        $services=Service::latest()->get();

        return response()->json([
            'data'=>[
                'services'=>$services
            ]
        ]);
    }
}
