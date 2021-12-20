<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Profile;
use App\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function wallet()
    {
        return view('dashboard.wallet');
    }

    public function investment()
    {
        return view('dashboard.investment');
    }
    public function showInvest()
    {
        return view('dashboard.investment.show');
    }

    public function profile($id)
    {
//        return now()->isToday();
        $profile = Profile::find($id);
        return view('dashboard.profile');
    }
    public function storeProfile(Request $request,$id)
    {
        $request->validate([
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required|numeric',
        ]);
        $profile = Profile::where('user_id',$id)->first();
        $input = $request->all();
        if(!empty($profile))
        {
            $profile->update($input);
        }else{
            $input['user_id'] = $id;
            Profile::create($input);
        }
        return back()->with('message','Successfully updated');
    }

    public function transaction()
    {
        $payments = Payment::where('user_id',Auth::user()->id)->get();
        return view('dashboard.transaction',compact('payments'));
    }

    public function referral(Request $request)
    {
        $request->validate([
            'affiliate_id' => 'required',
            'referred_id' => 'required',
        ]);
        $referral = new Referral();
        $referral->affiliate_id = $request->input('affiliate_id');
        $referral->referred_id = Auth::id();
        $referral->save();
        return back()->with('referral','Referral Added');
    }

    public function terms()
    {
        return view('dashboard.terms');
    }

}
