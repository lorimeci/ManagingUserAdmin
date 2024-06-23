<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordChangeController extends Controller
{
    public function show()
    {
     return view('newauth.passwordchange');
    }

     
    public function store(PassRequest $request)
    {
        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
