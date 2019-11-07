<?php

namespace App\Http\Controllers;
use App\Http\Request\ReminderRequest;
use Illuminate\Http\Request;
use Session, Event;
use Sentinel, Reminder;
use App\Events\ReminderEvent;

class ReminderController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('reminders.create');
    }

    public function store(\App\Http\Requests\ReminderRequest $request)
    {
        $getuser = User::where('email', $request->email)->first();

        if ($getuser) {
            $user = Sentinel::findById($getuser->$id);
            ($remider = Reminder::exist($user)) || ($reminder = 
            Reminder::create($user));
            Event::fire(new ReminderEvent($user, $reminder));
            Session::flash('notice', 'Check your mail instruction');
        } else {
            Session::flash('error', 'Email not Valid');
        }

        return view('reminders.create');
    }

    public function show($id)
    {
        //
    }

    public function edit($id, $code)
    {
        $user = Sentinel::findById($id);
        
        if (Reminder::exist($user, $code)) {
            return view('reminders.edit', ['id' => $id, 'code' =>$code] );
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id, $code)
    {
        $user = Sentinel::findById($id);
        $reminder = Reminder::exists($user, $code);

        if($reminder) {
            Session::Flash('notice', 'Your Password Success Modified');
            Reminder::complete($user, $code, $request->password);
            return redirect('login');
        } else {
            Session::flash('error', 'Password Not Match');
        }
    }

}
