<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $users = User::latest()->get();
        return view('user.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->type = $request->type;
        if ($request->hasFile('avatar')) {
            $user->avatar = HomeController::fileUpload($request->avatar, 'user', '');
        }
        $user->password = Hash::make($request->password);
        $user->save();

        alert('User', 'User Created Succssfully', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->phone = $request->phone;

        $user->type = $request->type;
        if ($request->hasFile('avatar')) {
            $user->avatar = HomeController::fileUpload($request->avatar, 'user', '');
        }

        $user->save();
        alert('User', 'User Update Succssfully', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        HomeController::fileDelete($user->avatar);
        $user->delete();
        alert('User', 'User Delete Succssfully', 'success');
        return back();
    }
}
