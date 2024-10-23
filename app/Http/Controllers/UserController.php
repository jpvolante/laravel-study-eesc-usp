<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;
    public function form()
    {
        $this->authorize('admin');
        

        return view('users.novoadmin');
    }

    public function register(Request $request)
    {   
        $this->authorize('admin');
        $request->validate([
            'codpes' => 'required|integer' // Remova '|codpes'
        ]);
        
        $user = User::where('codpes', $request->codpes)->first();
        if ($user) { // Verifique se o usuário existe
            $user->is_admin = true;
            $user->save();
        }
        return back();
    }
}
