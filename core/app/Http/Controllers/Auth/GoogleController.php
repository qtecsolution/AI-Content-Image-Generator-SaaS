<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{

     /**
     * Redirect to googel url.
     *
     * @return void
     */


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google Call back
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('home');

            }else{
                $findByEmail = User::where('email', $user->email)->first();
                if($findByEmail!=''){
                    $findByEmail->update(['google_id'=> $user->id]);
                    Auth::login($findByEmail);
                }else{
                    $newUser = User::updateOrCreate([
                        'email' => $user->email,
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'password' => bcrypt('password')
                    ]);

                    Auth::login($newUser);
                }


                return redirect()->intended('home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
