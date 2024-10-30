<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Spatie\Permission\Traits\HasRoles;
use \Uspdev\SenhaunicaSocialite\Traits\HasSenhaunica;
use \Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    public function username()
    {
        return 'codpes';
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function redirectToProvider(){
        return Socialite::driver('senhaunica')->redirect();
    }

    public function handleProviderCallback(){

        $userSenhaUnica = Socialite::driver('senhaunica')->user();

        
        $user = User::where('codpes', $userSenhaUnica->codpes)->first();
        
        if(is_null($user)) $user = new User;

        $user->codpes = $userSenhaUnica->codpes;
        $user->email = $userSenhaUnica->email;
        $user->name = $userSenhaUnica->nompes;
        $user->save();
        Auth::login($user, true);
        return redirect('/');
    }
    
}
