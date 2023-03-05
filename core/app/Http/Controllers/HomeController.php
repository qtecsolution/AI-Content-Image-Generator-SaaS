<?php

namespace App\Http\Controllers;

use App\Models\UseCase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cases = UseCase::where('is_published', 1)->get();
        return view('index', compact('cases'));
    }
    
    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('profile.profile', compact('user'));
    }
    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'phone' => 'required',
        ]);

        try {
            $data = User::findOrFail($id);
            $input = $request->except(['_token']);
            if ($request->hasFile('avatar')) {
                $input['avatar'] = fileUpload($request->file('avatar'), 'user', $request->name);
            }
            
            $data->update($input);
            myAlert('success','Profile Updated successfully');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error',$errorMessage);
            return back();
        }
    }
}
