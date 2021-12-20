<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Paystack;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        session()->put('amount',$request->input('amount'));
        session()->put('investment',$request->input('investment'));
        if($request->input('investment') == 'forex'){
            if($request->input('amount') < 100000 ){
                return back()->with('message','The amount doesnt meet the minimum requirement');
            }
            return view('dashboard.payment')->with('amt',session()->get('amount'));
        }else {
            return view('dashboard.payment')->with('amt',session()->get('amount'));
        }
    }

    public function redirectBack()
    {

    }
    public function redirectToGateway()
    {
        return \paystack()->getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = \paystack()->getPaymentData();
//        $user = User::where('email',$paymentDetails['data']['customer']['email'])->first();
        $payment = new Payment();
        $payment->payment_type = $paymentDetails['data']['metadata']['investment'];
        $payment->user_email = $paymentDetails['data']['customer']['email'];
        $payment->amount = $paymentDetails['data']['amount']/100;
        $payment->user_id = Auth::id();
        $payment->txn_ref = $paymentDetails['data']['reference'];
        $payment->authorization_code = $paymentDetails['data']['authorization']['authorization_code'];
        $payment->save();
        return redirect('/dashboard')->with('message','Transaction successful');
//        dd($paymentDetails['data']);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
}

