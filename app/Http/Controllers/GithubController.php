<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('github')->user();

            $gitUser = User::updateOrCreate([
                'github_id' => $user->id
            ], [
                'name' => $user->name,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'github_id' => $user->id,
                'auth_type' => 'github',
                'password' => Hash::make( Str::random(10) ),
            ]);

            Auth::login( $gitUser);
            return redirect()->route('dashboard');
            
        }catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->route('login')->with('error', $error);
        }
    }
}
