<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\JobPertama;
use App\Jobs\JobKedua;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['employee', 'manager']);
        return view('home');
    }

    public function tesJob(Request $request){
        JobPertama::dispatch('belajar queue dengan');
        // JobKedua::dispatch('laravel');
        $data = User::find(47);
        JobKedua::dispatch($data);
        return "berhasil";
    }
}
