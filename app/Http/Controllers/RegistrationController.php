<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Message;
use App\Mail\MessageCreated;
use App\Mail\NewUserNotification;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('newauth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required','numeric','min:10', 'unique:'.User::class],
            'address' => 'required |string',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' =>$request->address,
            'password' => Hash::make($request->password),
            'role' => "Guest",
        ]);
        
        event(new Registered($user));

        Auth::login($user);
        Mail::to($request->email)->send(new NewUserNotification());
        return redirect(RouteServiceProvider::HOME);

    }
}
