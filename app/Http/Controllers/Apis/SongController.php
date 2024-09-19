<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Resources\Song as ResourcesSong;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {

        $songs=Song::latest()
        ->with(['dj'])
        ->get();

        $songs=ResourcesSong::collection($songs);

        return response([
            'data'=>[
                'songs'=>$songs
            ]
        ]);

    }
}
