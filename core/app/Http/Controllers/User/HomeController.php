<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UseCase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $noPlan = 0;
        if(showBalance()==''){
            $noPlan = 1;
        }
        return view('user.home', compact('cases','noPlan'));
    }
    

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.profile.profile', compact('user'));
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
            myAlert('success', 'Profile Updated successfully');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
    public function password()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('user.profile.password', compact('user'));
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        $user = auth()->user();
        // Check if the current password matches the user's password
        if($user->google_id=='' || $user->pass_changed == 1){
            if($request->current_password==''){
                return redirect()->back()->withErrors(['current_password' => 'The current password is empty.']);
            }
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
        }
        


        try {
            // Update the user's password
            $user->password = Hash::make($request->new_password);
            $user->pass_changed = 1;
            $user->save();
            myAlert('success', 'Password Changed successfully');
            return back();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            myAlert('error', $errorMessage);
            return back();
        }
    }
}
