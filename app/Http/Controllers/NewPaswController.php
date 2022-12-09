<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPasswordStoreRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class NewPaswController extends Controller
{

    public function create(Request $request)
    {
        return view('newauth.reset-password', ['request' => $request]);
    }

    public function store(NewPasswordStoreRequest $request)
    {
        $request->validated();

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
        
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('newlogin')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
