<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Request\SessionRequest;
use Sentinel;
use Session;


class SessionsController extends Controller
{
    public function login()
    {
        if ($user = Sentinel::check())
        {
            Session::flash("notice", "You has login" . $user->email);
            return redirect('/');
        }else{
            return view('sessions.login');
        }
    }

    public function login_store(\App\Http\Requests\SessionRequest $request)
    {
        if($user = Sentinel::authenticate($request->all())) {
            Session::flash('notice', "Welcome" . $user->first_name);
            return redirect()->intended('/');
        }else{
            Session::flash('notice', "Login Gagal");
            return redirect('/login');
        }
    }

    public function logout()
    {
        Sentinel::logout();
        Session::flash('notice', 'Logout success');
        return redirect('/');
    }
}
