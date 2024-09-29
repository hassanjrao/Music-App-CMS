<?php

namespace App\Http\Controllers;

use App\Models\AppointmentFocus;
use Illuminate\Http\Request;

class AdminAppointmentFocusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointmentFocuses=AppointmentFocus::latest()->get();

        return view('appointment-focuses.index',compact('appointmentFocuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointmentFocus=null;

        return view('appointment-focuses.add_edit',compact('appointmentFocus'));
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
        ]);

        AppointmentFocus::create([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
        ]);

        return redirect()->route('appointment-focuses.index')->withToastSuccess('Added successfully');
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
        $appointmentFocus=AppointmentFocus::find($id);

        return view('appointment-focuses.add_edit',compact('appointmentFocus'));
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
        $appointmentFocus=AppointmentFocus::find($id);

        $request->validate([
            'title'=>'required',
            'subtitle'=>'required',
        ]);

        $data=[
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
        ];

        $appointmentFocus->update($data);

        return redirect()->route('appointment-focuses.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointmentFocus=AppointmentFocus::findorfail($id);

        $appointmentFocus->delete();

        return redirect()->route('appointment-focuses.index')->withToastSuccess('Deleted successfully');
    }
}
