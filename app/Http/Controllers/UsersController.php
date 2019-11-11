<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\Http\Request\UserRequest;
use DB;

class UsersController extends Controller
{
    public function signup()
    {
        return view('users.signup');
    }

    public function signup_store(\App\Http\Requests\UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $role = Sentinel::findRoleBySlug('writer'); //cari role writer
            $role_id = $role->id;
            $credentials = [
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name'),
                'email'      => $request->input('email'),
                'password'   => $request->input('password'),
            ];
            $user = Sentinel::registerAndActivate($credentials);
            $user->roles()->attach($role_id);
            Session::flash('notice', 'Success create new user');
            DB::commit(); 
        } catch (\Throwabel $errors) {
            DB::rollback();
            Session::flash('error', $errors);
        }
        return redirect()->back();
        
        Sentinel::registerAndActivate($credentials);
        Session::flash('notice', 'Success create new user');
        return redirect()->back();
        
    }
}
