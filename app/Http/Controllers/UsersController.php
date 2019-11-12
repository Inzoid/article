<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\Http\Request\UserRequest;
use DB;
use App\Jobs\JobKedua;

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
            DB::commit(); //simpan ke db
            JobKedua::dispatch($user);
        } catch (\Throwable $errors) {
            DB::rollback(); //rollback jika ada yg error pas insert db
            Session::flash('error', $errors);
            dd($error);
        }
        return redirect()->back();
        
        Sentinel::registerAndActivate($credentials);
        Session::flash('notice', 'Success create new user');
        return redirect()->back();
        
    }
}
