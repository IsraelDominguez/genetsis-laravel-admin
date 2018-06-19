<?php

namespace Genetsis\Admin\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends AuthController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;


    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }


    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('genetsis-admin::pages.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
