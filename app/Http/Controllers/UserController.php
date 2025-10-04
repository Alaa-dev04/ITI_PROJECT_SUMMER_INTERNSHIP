<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::all();
        return view('userprofile.userprofile',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userprofile.userform');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'profile_image'=>$request->profile_image
        ]);  
        return redirect()->route('userprofile.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users= User::find($id);
        return view('userprofile.singleuser',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users= User::find($id);
        return view('userprofile.edituser',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users= User::find($id);
        $users->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'profile_image'=>$request->profile_image 
        ]);  
            if ($request->hasFile('profile_image')) {
        $path = $request->file('profile_image')->store('profile_images', 'public');
        $users->profile_image = $path;
    }
    $users->save();
        return redirect()->route('userprofile.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users= User::find($id);
        $users->delete();
        return redirect()->route('userprofile.index');
    }
}
