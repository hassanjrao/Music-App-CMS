<?php

namespace App\Http\Controllers;

use App\Models\EventPlanningEssential;
use Illuminate\Http\Request;

class AdminEventPlanningEssentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventPlanningEssentials=EventPlanningEssential::latest()->get();

        return view('event-planning-essentials.index',compact('eventPlanningEssentials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventPlanningEssential=null;

        return view('event-planning-essentials.add_edit',compact('eventPlanningEssential'));
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
            'description'=>'required',
            'is_featured'=>'nullable',
            'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:20000',
        ]);

        // remove old featured video
        if($request->is_featured === 'on'){
            EventPlanningEssential::where('is_featured',1)->update(['is_featured'=>0]);
        }

        EventPlanningEssential::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_featured'=>$request->is_featured === 'on' ? 1 : 0,
            'video_path'=>$request->file('video')->store('videos/event-planning-essentials'),
        ]);

        return redirect()->route('event-planning-essentials.index')->withToastSuccess('Added successfully');
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
        $eventPlanningEssential=EventPlanningEssential::findorfail($id);

        return view('event-planning-essentials.add_edit',compact('eventPlanningEssential'));
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
        $eventPlanningEssential=EventPlanningEssential::findorfail($id);

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'is_featured'=>'nullable',
            'video'=>'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm|max:20000',
        ]);

        // remove old featured video
        if($request->is_featured === 'on'){
            EventPlanningEssential::where('is_featured',1)->update(['is_featured'=>0]);
        }

        $eventPlanningEssential->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_featured'=>$request->is_featured === 'on' ? 1 : 0,
        ]);

        if($request->hasFile('video')){
            $eventPlanningEssential->update([
                'video_path'=>$request->file('video')->store('videos/event-planning-essentials'),
            ]);
        }

        return redirect()->route('event-planning-essentials.index')->withToastSuccess('Updated successfully');
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
    }
}
