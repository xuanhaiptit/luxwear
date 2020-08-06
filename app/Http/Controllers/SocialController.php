<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Redirect;
use App\Social;
use App\User;
use Auth;


class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        return redirect('/');
    }
    private function findOrCreateUser($facebookUser){
        $authUser = User::where('provider_id', $facebookUser->id)->first();

        if($authUser){
            return $authUser;
        }

        return User::create([
            'fullname' => $facebookUser->name,
            'password' => $facebookUser->token,
            'email' => $facebookUser->email,
            'provider_id' => $facebookUser->id,
            'provider' => $facebookUser->id,
        ]);
    }
}
