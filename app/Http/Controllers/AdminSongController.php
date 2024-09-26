<?php

namespace App\Http\Controllers;

use App\Models\DJ;
use App\Models\Song;
use Illuminate\Http\Request;

class AdminSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs=Song::latest()
        ->with(['dj'])
        ->get();

        return view('songs.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $song=null;
        $djs=DJ::latest()->get();

        return view('songs.add_edit',compact('song','djs'));
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
            'title'=>'required',
            'subtitle'=>'required',
            'dj'=>'required|exists:d_js,id',
            'description'=>'nullable',
            'audio'=>'required|file',
            'thumbnail'=>'required|file',
            'cover_image'=>'required|file',
        ]);

        Song::create([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'dj_id'=>$request->dj,
            'description'=>$request->description,
            'song'=>$request->file('audio')->store('songs'),
            'thumbnail'=>$request->file('thumbnail')->store('songs'),
            'image'=>$request->file('cover_image')->store('songs'),
            'published_at'=>now(),
        ]);

        return redirect()->route('songs.index')->withToastSuccess('Song added successfully');
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
        $song=Song::findOrFail($id);
        $djs=DJ::latest()->get();

        return view('songs.add_edit',compact('song','djs'));
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
        $song=Song::findOrFail($id);

        $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
            'dj'=>'required|exists:d_js,id',
            'description'=>'nullable',
            'audio'=>'nullable|file',
            'thumbnail'=>'nullable|file',
            'cover_image'=>'nullable|file',
        ]);

        $data=[
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'dj_id'=>$request->dj,
            'description'=>$request->description,
        ];

        if($request->hasFile('audio')){
            $data['song']=$request->file('audio')->store('songs');
        }

        if($request->hasFile('thumbnail')){
            $data['thumbnail']=$request->file('thumbnail')->store('songs');
        }

        if($request->hasFile('cover_image')){
            $data['image']=$request->file('cover_image')->store('songs');
        }

        $song->update($data);

        return redirect()->route('songs.index')->withToastSuccess('Song updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Song::findOrFail($id)->delete();

        return redirect()->route('songs.index')->withToastSuccess('Song deleted successfully');
    }
}
