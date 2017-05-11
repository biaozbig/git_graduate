<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\AdminController as Controller;
use Cookie;
use Request;
use View;

class AuthController extends Controller
{

    public function login()
    {
        if (Request::input()) {
            $userData = [
                'name' => Request::input('username'),
                'password' => Request::input('password')
            ];
            $rememberMe = Request::input('remember') == 'yes';

            if ($e = Auth::attempt($userData, $rememberMe)) {
                $login_path = Request::input('login_path') ?: Cookie::get('login_path');
                if (empty($login_path)) {
                    return \redirect()->route('admin.home');
                } else {
                    $cookie = Cookie::forget('login_path');
                    return \redirect($login_path)->withCookie($cookie);
                }
            } else {
            }
        }

        $this->layoutData['content'] = View::make('auth.login2' );
        $this->layoutData['title'] = 'Login';
        return null;
    }

    public function logout()
    {
        Auth::logout();
        return \redirect()->route('login');
    }

}