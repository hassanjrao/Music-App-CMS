<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::latest()->get();

        return view('events.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event=null;

        return view('events.add_edit',compact('event'));
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
            'name'=>'required',
            'image'=>'required|image',
            'description'=>'required',
            'date'=>'required',
            'time_start'=>'required',
            'time_end'=>'required',
            'venue'=>'required',
            'location'=>'required',
            'is_active'=>'nullable',
        ]);

        Event::create([
            'name'=>$request->name,
            'image'=>$request->file('image')->store('images/events'),
            'description'=>$request->description,
            'date'=>$request->date,
            'time_start'=>$request->time_start,
            'time_end'=>$request->time_end,
            'venue'=>$request->venue,
            'location'=>$request->location,
            'is_active'=>$request->is_active == 'on' ? 1 : 0,
        ]);

        return redirect()->route('events.index')->withToastSuccess('Added successfully');
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
        $event=Event::find($id);

        return view('events.add_edit',compact('event'));
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
        $event=Event::find($id);

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|image',
            'date'=>'required',
            'time_start'=>'required',
            'time_end'=>'required',
            'venue'=>'required',
            'location'=>'required',
            'is_active'=>'nullable',

        ]);

        $data=[
            'name'=>$request->name,
            'description'=>$request->description,
            'date'=>$request->date,
            'time_start'=>$request->time_start,
            'time_end'=>$request->time_end,
            'venue'=>$request->venue,
            'location'=>$request->location,
            'is_active'=>$request->is_active == 'on' ? 1 : 0,
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|image',
            ]);

            $data['image']=$request->file('image')->store('images/events');
        }

        $event->update($data);

        return redirect()->route('events.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::findorfail($id);

        $event->delete();

        return redirect()->route('events.index')->withToastSuccess('Deleted successfully');
    }
}
