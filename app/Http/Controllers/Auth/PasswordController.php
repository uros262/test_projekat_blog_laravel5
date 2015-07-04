<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
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

    use ResetsPasswords; //mailtrap.io

//MAIL_DRIVER=smtp
//MAIL_HOST=mailtrap.io
//MAIL_PORT=2525
//MAIL_USERNAME=urosgggxxx@gmail.com
//MAIL_PASSWORD=huanitabaloteli262
//MAIL_ENCRYPTION=null

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
