<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Song;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $songs = Song::orderBy("id", "desc")->get();
        $albums = Album::orderBy("id", "desc")->get();
        $genres = Genre::orderBy("id", "desc")->get();


        return view("songs.index", compact("songs", "albums", "genres"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "song" => "required",
            "title" => "required",
            "genre_id" => "required",
            "dj_name" => "required",
            "image" => "required",
            "check_date" => "required",

        ]);


        $song = Song::create([
            "song" => $request->file('song')->store("songs/"),
            "album_id" => $request->album_id,
            "title" => $request->title,
            "genre_id" => $request->genre_id,
            "image" => $request->file('image')->store("images/songs/"),
            "description" => $request->description,
            "dj_name" => $request->dj_name,
            "explicit_lyrics" => $request->explicit_lyrics === null ? 0 : 1,
            "private" => $request->private === null ? 0 : 1,
            "published_at" => $request->check_date === "Later" ? $request->published_date : now()

        ]);


        $tagsArr = explode(",", $request->tags);

        foreach ($tagsArr as $key => $tag) {

            $tagR = Tag::firstOrCreate([
                "tag" => $tag
            ]);

            $song->tags()->attach($tagR->id);
        }


        return redirect()->route("songs.index")->withToastSuccess("Successfully Added");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::findorfail($id);
        $albums = Album::orderBy("id", "desc")->get();
        $genres = Genre::orderBy("id", "desc")->get();


        return view("songs.edit", compact("song", "albums", "genres"));
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
            "title" => "required",
            "genre_id" => "required",
            "dj_name" => "required",
            "published_date" => "required",
        ]);



        $song = Song::findorfail($id);

        if ($request->hasFile("image")) {

            if ($song->image) {
                Storage::delete("public/images/songs/" . $song->image);
            }

            $request->file('image')->store("public/images/songs/");
            $imageName = $request->file('image')->hashName();

            $artwork_url = asset("/storage/images/songs/$imageName");


            $song->update([
                "image" => $imageName,
                "artwork_url" => $artwork_url,
            ]);
        }


        if ($request->hasFile("song")) {

            if ($song->song) {
                Storage::delete("public/files/songs/" . $song->song);
            }

            $request->file('song')->store("public/files/songs/");
            $fileName = $request->file('song')->hashName();

            $streaming_url = asset("/storage/files/songs/$fileName");


            $song->update([
                "song" => $fileName,
                "streaming_url" => $streaming_url
            ]);
        }

        $song->update([
            "album_id" => $request->album_id,
            "title" => $request->title,
            "genre_id" => $request->genre_id,
            "description" => $request->description,
            "dj_name" => $request->dj_name,
            "explicit_lyrics" => $request->explicit_lyrics === null ? 0 : 1,
            "private" => $request->private === null ? 0 : 1,
            "published_at" => $request->published_date
        ]);


        $tagsArr = explode(",", $request->tags);


        $newTagsArr = [];
        foreach ($tagsArr as $key => $tag) {

            $tagR = Tag::firstOrCreate([
                "tag" => $tag
            ]);


            array_push($newTagsArr, $tagR->id);
            // $song->tags()->attach($tagR->id);
        }

        $song->tags()->sync($newTagsArr);
        // $tagR->songs()->sync($newTagsArr);



        return redirect()->route("songs.index")->withToastSuccess("Successfully Updated!");
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
        $song = Song::findorfail($id);

        Storage::delete("public/files/songs/" . $song->song);

        Storage::delete("public/images/songs/" . $song->image);


        $song->tags()->detach();


        $song->delete();



        return redirect()->route("songs.index")->withToastSuccess("Successfully Deleted!");
    }
}
