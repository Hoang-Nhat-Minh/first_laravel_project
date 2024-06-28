<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleredirect()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
    }
}
