<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        $staffs=Staff::latest()->get();
        return response()->json([
            'data'=>[
                'staffs'=>$staffs
            ]
        ]);
    }
}
