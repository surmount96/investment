<?php

namespace App\Http\Controllers;

use App\Investment;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payments = Payment::where('user_id', Auth::id())->get();

        if(!empty($payments)){
            $data['percent'] = '';
            $invest = [];
            foreach($payments as $payment){
                $data['amount'] = $payment->amount;
                $invest = Investment::where('payment_id',$payment->id)->first();
//                if(!empty($invest)){
//                    $data['percent'] = $invest->percent;
//                }
//                dd($invest->updated_at->isToday());
                if(empty($invest))
                {
                    $invest = new Investment();
                    $invest->payment_id = $payment->id;
                    $invest->percent = 0.8;
                    $invest->save();
                } else{
                    if(!now()->isWeekend()){
                        if(!$invest->updated_at->isToday() && $invest->created_at->diffInDays(Carbon::now()) < 33)
                        {
                            $invest->percent = $invest->percent + 0.8;
                            $invest->update();
                        }
                    }

                }
            }
        }
//        $payment = Payment::where('user_id', Auth::id())->latest()->first();
//
//        if(!empty($payment)){
//            $data['percent'] = '';
//            $data['amount'] = $payment->amount;
//            $invest = Investment::where('payment_id',$payment->id)->first();
//            if(!empty($invest)){
//                $data['percent'] = $invest->percent;
//            }
//            if(empty($invest))
//            {
//                $invest = new Investment();
//                $invest->payment_id = $payment->id;
//                $invest->percent = 0.8;
//                $data['percent'] = $invest->percent;
//                $invest->save();
//            } else{
//                if($invest->updated_at->isToday() && $invest->updated_at->diffInDays(Carbon::now()) < 33 && $invest->updated_at->format('D') != 'Sun' && $invest->updated_at->format('D') != 'Sat')
//                {
//                    $data['percent'] = $invest->percent;
//                }else{
//                    $invest->percent = $invest->percent + 0.8;
//                    $invest->update();
//                }
//            }
//        }else{
//            $data['percent'] = 0.0;
//            $data['amount'] = 0.0;
//        }
        return view('dashboard.index',compact('data','payments'));
    }
}
