<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class ChatController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=', Auth::user()->id)->get();
        return view('dashboard.chat',compact('users'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['sender_id'] = Auth::user()->id;
        $user = Auth::user();
        $message = Message::create($input);
        broadcast(new MessageSent($message,$user))->toOthers();
        return [
            'status' => 200,
            'message' =>'successfully created'
        ];
    }

    public function chat()
    {
        $message = Message::whereIn('sender_id',[Auth::user()->id,\request('receiver_id')])
            ->whereIn('receiver_id',[Auth::user()->id,\request('receiver_id')])->with('receiver')->with('sender')->get();
        return $message;
    }

    public function userName()
    {
        return User::where('id',\request('receiver_id'))->first();
    }
    public function user()
    {
        return Auth::user();
    }

    public function superAdmin()
    {
        $user = User::where('email','superadmin@mail.com')->first();
        return $user;
    }


}
