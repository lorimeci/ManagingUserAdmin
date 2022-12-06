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
    // public function store(NewLoginRequest $request)
    // {
    //     // $request->authenticate();
       
    //     // $request->session()->regenerate();
    //     $request->validated();
    //     $user = User::where('email','=',$request->email)->first();
    //     if($user){
    //         if(Hash::check($request->password, $user->password)){

    //         }else{
    //             return back()->with('fail','Password doesnt match!');
    //             $request->session()->put('loginId',$user->id);
    //         }
    //     }else{
    //         return back()->with('fail','This email is not registred!');
    //     }
    //     return redirect()->intended(RouteServiceProvider::HOME);

      
   // }
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);

    }
   
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('newlogin');
    }
}
