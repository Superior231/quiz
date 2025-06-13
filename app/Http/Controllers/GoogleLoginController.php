<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();

        if(!$user)
        {
            $user = User::create(
                ['name' => $googleUser->name,
                 'email' => $googleUser->email,
                 'password' => Hash::make(rand(100000,999999)),
                 'avatar_google' => $googleUser->avatar,
                ]
            );
        }

        if ($user->status === 'Banned') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akunmu talah dibanned!');
        }

        Auth::login($user);

        return redirect('/');
    }
}
