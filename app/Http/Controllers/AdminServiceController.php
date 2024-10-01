<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::latest()->get();

        return view('services.index',compact('services'));
    }

    public function requests(Request $request){

        $serviceRequests=ServiceRequest::latest()
            ->when($request->service_id,function($q) use($request){
                $q->where('service_id',$request->service_id);
            })
        ->get();

        return view('services.requests',compact('serviceRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service=null;

        return view('services.add_edit',compact('service'));
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
        ]);

        Service::create([
            'name'=>$request->name,
            'image'=>$request->file('image')->store('images/services'),
            'description'=>$request->description,
        ]);

        return redirect()->route('services.index')->withToastSuccess('Added successfully');
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
        $service=Service::find($id);

        return view('services.add_edit',compact('service'));
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
        $service=Service::find($id);

        $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $data=[
            'name'=>$request->name,
            'description'=>$request->description,
        ];

        if($request->hasFile('image')){
            $request->validate([
                'image'=>'required|image',
            ]);

            $data['image']=$request->file('image')->store('images/services');
        }

        $service->update($data);

        return redirect()->route('services.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::findorfail($id);

        $service->delete();

        return redirect()->route('services.index')->withToastSuccess('Deleted successfully');
    }
}
