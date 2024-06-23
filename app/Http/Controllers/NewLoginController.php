<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\NewLoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NewLoginController extends Controller
{
    public function create()
    {
        return view('newauth.login');
    }
   
    public function store(NewLoginRequest $request)
    {
        $request->validated();
        if (!Auth::attempt(array('email' => $request['email'], 'password' => $request['password']))) {
            return redirect()->route('newlogin')
            ->with(['error' => "The provided credentials do not match our records."]);
        }

        $request->session()->regenerate();

         return redirect()->intended(RouteServiceProvider::HOME);

    }
   
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('newlogin');
    }
}
