<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')->user();

            $googleUser = User::updateOrCreate([
                'google_id' => $user->id
            ], [
                'name' => $user->name,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'google_id' => $user->id,
                'auth_type' => 'google',
                'password' => Hash::make( Str::random(10) ),
            ]);

            Auth::login( $googleUser);
            return redirect()->route('dashboard');
        }
        catch (\Exception $e){
            $error = $e->getMessage();
            return redirect()->route('login')->with('error', $error);
        }
    }
}
