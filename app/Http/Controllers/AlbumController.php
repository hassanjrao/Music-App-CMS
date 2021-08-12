<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use App\Models\Tag;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums=Album::orderBy("id","desc")->get();

        return view("albums.index",compact("albums"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name"=>"required"
        ]);

        Album::create([
            "name"=>$request->name
        ]);

        return redirect()->route("albums.index")->withToastSuccess("Album Add Succefully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $album=Album::findorfail($id);

        return view("albums.edit",compact("album"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            "name"=>"required"
        ]);

        $album=Album::findorfail($id);

        $album->update([
            "name"=>$request->name
        ]);

        return redirect()->route("albums.index")->withToastSuccess("Updated Succefully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $album=Album::findorfail($id);

        $songs = Song::where("album_id", "=", $id)->get();

        foreach ($songs as $key => $song) {

            $song->tags()->detach();
        
            $song->delete();
        }


        $album->delete();

        return redirect()->route("albums.index")->withToastSuccess("Deleted Successfully");
    }
}
