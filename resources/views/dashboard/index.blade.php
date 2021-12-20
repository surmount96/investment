@extends('layouts.app')

@section('content')
    <div class="my-4 w-full ">
        <h3 class="text-large text-dark">Hello, {{ Auth::user()->name }}</h3>
    </div>
    @if(Session('message'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="">{{ Session('message') }}</p>
        </div>
    @endif
    @if(Session('referral'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="">{{ Session('referral') }}</p>
        </div>
    @endif
    @if ($errors->has('affiliate_id'))
        <span class="text-medium text-red" role="alert">
            {{ $errors->first('affiliate_id') }}
        </span>
    @endif
    @role('Member')

    @if(!Auth::user()->profile)
    <profile-modal>
        <div class="lg:mx-auto md:mx-auto bg-white h-auto my-2 lg:w-2/4 md:w-2/4 mx-4 relative">
            <div class="absolute top-0 right-0">
                <button class="px-12 bg-orange text-white py-2 cursor-pointer focus:outline-none" @click="hideProfile">&times;</button>
            </div>
            <div class="p-6">
                <div class="flex flex-wrap items-center justify-center lg:my-10 md:my-10 mt-3">
                    <div class="mb-3">
                        <div class="h-16 w-16 bg-gray-500 rounded-full"></div>
                    </div>
                    <div class="lg:ml-6 md:ml-6 mb-3 lg:text-left md:text-left text-center">
                        <h4 class="text-h4 mb-2 text-blue-base">Hey, {{ Auth::user()->name }}</h4>
                        <p class="text-medium text-gray-dark">please update your profile</p>
                        <div class="mt-6">
                            <a href="/user/profile/{{ Auth::id() }}" class="bg-blue-deeper text-white px-4 py-3 rounded text-medium">Update my profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </profile-modal>
    @endif
    <div class="flex items-center justify-end my-4">
        <button class="py-2 px-10 rounded w- bg-orange shadow text-white" @click="withdraw">withdraw</button>
        <div class="ml-3">
            <a href="/user/investment" class="bg-blue-base text-white py-3 rounded px-12">Deposit</a>
        </div>
    </div>
    <div class="flex flex-wrap">
        @if(count($payments)>0)
            @foreach($payments as $payment)
            <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full mb-4">
                <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                    <h3 class="text-blue-base border-bottom border-gray mb-4 text-large border-b border-gray pb-2">{{ $payment->payment_type }} Investment</h3>
                    <div class="px-3 text-medium">
                        <p class="text-h4 my-6 text-center text-blue-base font-bold flex items-center"><span class="line-through">N</span>{{ $payment->amount }}
                            (<span class="text-green font-normal text-body-2 mx-1">{{ $payment->invest->percent }}%</span><svg class="w-3 text-green" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 7l4-4m0 0l4 4m-4-4v18"></path></svg>)
                        </p>
                        <div class="mt-8">
{{--                            <a href="/user/investment" class="bg-blue-base text-white py-3 rounded px-12">Deposit</a>--}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <div class="flex flex-wrap mt-6">
        <div class="lg:w-1/2 md:w-1/2 sm:w-1/2 w-full mb-4">
            <a href="/dashboard">
                <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                    <h2 class="font-semibold text-h4">Wallet</h2>
                    <div class="justify-center flex items-center" style="height: 80%">
                        <p class="text-h3 text-blue-base font-bold"><span class="line-through">N</span>0.00</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-1/2 w-full mb-4">
            <a href="/user/transaction">
                <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                    <h2 class="font-semibold text-h4">Transaction</h2>
                    <div class="justify-center flex items-center" style="height: 80%">
                        <p>{{ Auth::user()->payments->count() }} transactions history</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="flex flex-wrap">
        {{--        <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full mb-4">--}}
        {{--            <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">--}}
        {{--                <h3 class="text-blue-base border-bottom border-gray mb-4 text-large border-b border-gray pb-2">Current Investment</h3>--}}
        {{--                <div class="px-3 text-medium">--}}
        {{--                    <p class="text-h4 my-6 text-center text-blue-base font-bold flex items-center"><span class="line-through">N</span>{{ $data['amount'] }}--}}
        {{--                        (<span class="text-green font-normal text-body-2 mx-1">{{ $data['percent'] }}%</span><svg class="w-3 text-green" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 7l4-4m0 0l4 4m-4-4v18"></path></svg>)--}}
        {{--                    </p>--}}
        {{--                    <div class="mt-8">--}}
        {{--                        <a href="/user/investment" class="bg-blue-base text-white py-3 rounded px-12">Deposit</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="lg:w-1/2 md:w-1/2 sm:w-1/2 w-full mb-4">
            <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                <h3 class="text-blue-base border-bottom border-gray mb-4 text-large border-b border-gray pb-2">Referrals</h3>
                <div class="px-3 text-medium">
                    <p class="mb-4">Referral bonus is <span class="line-through">N</span>500 and it doesn't add to your current investment.</p>
                    <div class="mt-8">
                        <button @click="referralModal" class="bg-blue-base text-white py-3 rounded px-12">Generate link</button>
                    </div>
                    <custom-modal>
                        <div class="lg:mx-auto md:mx-auto bg-white h-auto my-2 lg:w-2/3 md:w-2/3 mx-4 relative">
                            <div class="p-6 relative">
                                <div class="h-40" style="background-image: url('{{ asset('img/referral.svg') }}'); background-size: contain; background-position: center; background-repeat: no-repeat"></div>
                                <div class="" v-show="!referral">
                                    <p class="text-medium text-center">Copy your referral code</p>
                                    <div class="mx-auto flex items-center" style="width:70%">
                                        <input type="text" readonly="readonly" ref="input" value="{{ Auth::user()->affiliate_id }}" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                                        <button @click="copy" class="bg-blue-deeper text-white px-8 py-3 rounded ml-1">copy</button>
                                    </div>
                                </div>
                                <div class="" v-show="referral">
                                    <p class="text-medium text-center mt-3">Provide the code of your referral</p>
                                    <form action="/user/referral" method="post">
                                        @csrf
                                        <div class="w-64 mx-auto">
                                            <input type="text" placeholder="referral code" name="affiliate_id" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="bg-orange text-white px-8 py-2 rounded">send</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="absolute left-0 top-0">
                                    <button @click="toggleReferral" class="bg-blue-deeper text-white px-3 py-2 rounded">
                                        <span v-show="!referral">Who referred you?</span>
                                        <span v-show="referral">Copy referral code</span>
                                    </button>
                                </div>
                                <div class="absolute top-0 right-0">
                                    <button class="px-12 bg-orange text-white py-2 cursor-pointer focus:outline-none" @click="hideReferral">&times;</button>
                                </div>
                            </div>
                        </div>
                    </custom-modal>
                </div>
            </div>
        </div>

        <div class="lg:w-1/2 md:w-1/2 sm:w-1/2 w-full mb-4">
            <div class="shadow-md px-5 py-8 rounded-lg bg-blue-base text-white" style="width: 95%; height:190px">
                <h3 class="mb-4 text-large pb-2 font-bold">Great Job!</h3>
                <div class="text-medium">
                    <p class="">No action to do</p>
                    <div class="bg-yellow h-12 w-12 flex items-center justify-center ml-auto rounded-full">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="check text-white w-6 h-6"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    {{--                    <button class="bg-blue-base text-white py-3 rounded px-12">Generate link</button>--}}
                </div>
            </div>
        </div>
    </div>
    @endrole
    @role('Administrator')
    <div class="flex flex-wrap">
        <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full">
            <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                <h3 class="text-blue-base border-bottom border-gray mb-4 text-large border-b border-gray pb-2">Current Investment</h3>
                <div class="px-3 text-medium">
                    <p class="text-h4 my-6 text-center text-blue-base font-bold flex items-center"><span class="line-through">N</span>0.0
                        (<span class="text-green font-normal text-body-2 mx-1">0%</span><svg class="w-3 text-green" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M8 7l4-4m0 0l4 4m-4-4v18"></path></svg>)
                    </p>
                    <div class="mt-8">
                        <a href="/admin/investment" class="bg-blue-base text-white py-3 rounded px-12">Deposit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full">
            <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                <h3 class="text-blue-base border-bottom border-gray mb-4 text-large border-b border-gray pb-2">Referrals</h3>
                <div class="px-3 text-medium">
                    <p class="mb-4">Referral bonus is <span class="line-through">N</span>500 and it doesn't add to your current investment.</p>
                    <div class="mt-8">
                        <a href="/admin/users" class="bg-blue-base text-white py-3 rounded px-12">Generate link</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full">
            <div class="shadow-md px-5 py-8 rounded-lg bg-blue-base text-white" style="width: 95%; height:190px">
                <h3 class="mb-4 text-large pb-2 font-bold">Great Job!</h3>
                <div class="text-medium">
                    <p class="">No action to do</p>
                    <div class="bg-yellow h-12 w-12 flex items-center justify-center ml-auto rounded-full">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="check text-white w-6 h-6"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                    </div>
                    {{--                    <button class="bg-blue-base text-white py-3 rounded px-12">Generate link</button>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap mt-6">
        <div class="lg:w-1/2 md:w-1/2 sm:w-1/2 w-full mb-4">
            <a href="/admin/transaction">
                <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                    <h2 class="font-semibold text-h4">Transaction</h2>
                    <div class="justify-center flex items-center" style="height: 80%">
                        <p>{{ Auth::user()->payments->count() }} transactions history</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    @endrole
    <div class="my-4 flex flex-wrap">
        <div class="lg:w-1/2 md:w-1/2 w-full mb-4 py-10 hover:opacity-80 transition-opacity cursor-pointer shadow p-4 ">
            <h2 class="font-semibold text-h4">Forex</h2>
            <img src="{{ asset('img/unnamed.gif') }}" alt="">
        </div>
        <div class="lg:w-1/2 md:w-1/2 w-full mb-4 py-10 hover:opacity-80 transition-opacity cursor-pointer shadow p-4 ">
            <h2 class="font-semibold text-h4 my-8"></h2>
            <img src="{{ asset('img/chart.gif') }}" alt="">
        </div>
    </div>
    <v-dialog />
@endsection
