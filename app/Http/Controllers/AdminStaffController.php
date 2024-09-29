<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class AdminStaffController extends Controller
{
          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs=Staff::latest()->get();

        return view('staffs.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff=null;

        return view('staffs.add_edit',compact('staff'));
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
            'designation'=>'required',
            'description'=>'required',
        ]);

        Staff::create([
            'name'=>$request->name,
            'image'=>$request->file('image')->store('images/staffs'),
            'designation'=>$request->designation,
            'description'=>$request->description,
        ]);

        return redirect()->route('staffs.index')->withToastSuccess('Added successfully');
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
        $staff=Staff::find($id);

        return view('staffs.add_edit',compact('staff'));
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
        $staff=Staff::find($id);

        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'description'=>'required',
        ]);

        $data=[
            'name'=>$request->name,
            'designation'=>$request->designation,
            'description'=>$request->description,
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|image',
            ]);

            $data['image']=$request->file('image')->store('images/staffs');
        }

        $staff->update($data);

        return redirect()->route('staffs.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff=Staff::findorfail($id);

        $staff->delete();

        return redirect()->route('staffs.index')->withToastSuccess('Deleted successfully');
    }
}
