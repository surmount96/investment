<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function investment()
    {
        return view('admin.investment');
    }

    public function users()
    {
        $users = User::where('id','!=',Auth::id())->latest()->get();
        return view('admin.users',compact('users'));
    }

    public function transaction()
    {
        $payments = Payment::latest()->with('user')->get();
        return view('admin.transaction',compact('payments'));
    }

    public function show($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.user.show',compact('user'));
    }

    public function edit(Request $request,$id)
    {
        $user = User::where('id',$id)->first();
        $user->update($request->all());
        return back()->with('message','User details updated');
    }

    public function delete($id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return back()->with('message','User deleted');
    }
}
