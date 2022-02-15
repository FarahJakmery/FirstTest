<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class TestRemembermeController extends Controller
{
    public function registerform()
    {
        return view('rememberme.signup');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $usersignup = new User;
        $usersignup->name      = $request->name;
        $usersignup->email     = $request->email;
        $usersignup->password  = Hash::make($request->password);
        $usersignup->save();
        return redirect()->route('user.login');
    }


    public function loginform()
    {
        return view('rememberme.login');
    }

    public function checklogin(Request $request)
    {
        $input = $request->all();
        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]
        );

        if ($request->rememberme === null) {
            setcookie('login_email', $request->email, 100);
            setcookie('login_pass', $request->password, 100);
        } else {
            setcookie('login_email', $request->email, time() + 60 * 60 * 24 * 100);
            setcookie('login_pass', $request->password, time() + 60 * 60 * 24 * 100);
        }
        if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
            Session::put('user_session', $input['email']);
            return redirect('/home');
        } else {
            dd('Invalid credentials!');
        }
    }

    public function dashboard()
    {
        return view('rememberme.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('user_session');
        return redirect()->route('user.login');
    }
}
