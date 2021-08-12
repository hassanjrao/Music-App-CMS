<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("profile.index");
    }

    public function updateUser(Request $request, $id)
    {
        //
        $request->validate([
            "name" => "required",
            "email" => "required|unique:users,email,$id",
           
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
           
        ]);

        return redirect()->route("profile.index")->withToastSuccess('Successfully Updated!');

        // return $request->input();

    }

    public function updatePassword(Request $request, $id)
    {

        $user = User::find($id);


        $validated = $request->validate([
            'password' => 'required|min:8',
        ]);


        $user->update([
            $user->password = bcrypt($request->password)
        ]);

        return redirect()->route("profile.index")->withToastSuccess("Password Updated Succefully");
    }

  
}
