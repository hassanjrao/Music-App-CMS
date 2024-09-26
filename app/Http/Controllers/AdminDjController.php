<?php

namespace App\Http\Controllers;

use App\Models\DJ;
use Illuminate\Http\Request;

class AdminDjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $djs=DJ::latest()->get();

        return view('djs.index',compact('djs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dj=null;

        return view('djs.add_edit',compact('dj'));
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
            'about'=>'required',
        ]);

        DJ::create([
            'name'=>$request->name,
            'image'=>$request->file('image')->store('images/djs'),
            'about'=>$request->about,
        ]);

        return redirect()->route('djs.index')->withToastSuccess('DJ added successfully');
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
        $dj=DJ::find($id);

        return view('djs.add_edit',compact('dj'));
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
        $dj=DJ::find($id);

        $request->validate([
            'name'=>'required',
            'about'=>'required',
        ]);

        $data=[
            'name'=>$request->name,
            'about'=>$request->about,
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|image',
            ]);

            $data['image']=$request->file('image')->store('images/djs');
        }

        $dj->update($data);

        return redirect()->route('djs.index')->withToastSuccess('DJ updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dj=DJ::findorfail($id);

        $dj->delete();

        return redirect()->route('djs.index')->withToastSuccess('DJ deleted successfully');
    }
}
