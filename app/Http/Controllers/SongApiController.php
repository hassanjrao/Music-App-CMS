<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Song;
use App\Models\Tag;
use Illuminate\Http\Request;

class SongApiController extends Controller
{
    public function index($id = null)
    {

        $songs = [];

        if ($id) {


            $song = Song::find($id);

            if(!$song){
                abort(404,"Song not found");
            }

            // if ($song) {
                array_push($songs, [
                    "id" => (string)$song->id,
                    "song" => $song->song,
                    "album" => $song->album->name,
                    "title" => $song->title,
                    "genre" => $song->genre->genre,
                    "image" => $song->image,
                    "description" => $song->description,
                    "dj_name" => $song->dj_name,
                    "streaming_url" => $song->streaming_url,
                    "tags" => $song->tags,
                    "explicit_lyrics" => $song->explicit_lyrics == 1 ? "yes" : "no",
                    "private" => $song->private == 1 ? "yes" : "no",
                    "published_at" => $song->published_at,

                ]);
            // }
        } else {

            foreach (Song::all() as $key => $song) {

                $tags = Tag::find($song->id);

                array_push($songs, [
                    "id" => (string)$song->id,
                    "song" => $song->song,
                    "album" => $song->album->name,
                    "title" => $song->title,
                    "genre" => $song->genre->genre,
                    "image" => $song->image,
                    "description" => $song->description,
                    "dj_name" => $song->dj_name,
                    "streaming_url" => $song->streaming_url,
                    "tags" => $song->tags,
                    "explicit_lyrics" => $song->explicit_lyrics == 1 ? "yes" : "no",
                    "private" => $song->private == 1 ? "yes" : "no",
                    "published_at" => $song->published_at,

                ]);
            }
        }

        return ["results" => $songs];
    }

    public function getSongAlbum($id)
    {
        return Album::findorfail($id);
    }

    public function getSongGenre($id)
    {
        return Genre::findorfail($id);
    }
}
