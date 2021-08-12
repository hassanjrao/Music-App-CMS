<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Song;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::orderBy("id", "desc")->get();

        return view("genres.index", compact("genres"));
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
            "genre" => "required"
        ]);

        Genre::create([
            "genre" => $request->genre
        ]);

        return redirect()->route("genres.index")->withToastSuccess("Genre Added Succefully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::findorfail($id);


        return view("genres.edit", compact("genre"));
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
        $request->validate([
            "genre" => "required"
        ]);

        $genre = Genre::findorfail($id);

        $genre->update([
            "genre" => $request->genre
        ]);

        return redirect()->route("genres.index")->withToastSuccess("Updated Succefully");
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
        $genre = Genre::findorfail($id);

        $songs = Song::where("genre_id", "=", $id)->get();

        foreach ($songs as $key => $song) {

            $song->tags()->detach();

            $song->delete();
        }


        $genre->delete();

        return redirect()->route("genres.index")->withToastSuccess("Deleted Successfully");
    }
}
