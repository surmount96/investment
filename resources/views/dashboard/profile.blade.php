@extends('layouts.app')

@section('content')
    @if(Session('message'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="">{{ Session('message') }}</p>
        </div>
    @endif
    <div class="lg:w-2/3 md:w-2/3 w-full lg:mx-auto md:mx-auto mx-4 p-5">
        <div class="flex items-center">
            <div class="h-24 w-24 rounded-full bg-orange flex items-center">
                <img src="{{ asset('img/boy.png') }}" alt="" class="w-20 mx-auto">
            </div>
            <div class="ml-6">
               <p class="text-large">{{ Auth::user()->name }}</p>
                <p class="text-medium text-gray-grayer">{{ Auth::user()->profile ? Auth::user()->profile->address: 'Address'}}</p>
            </div>
        </div>
        <div class="my-5">
            <form action="/user/profile/{{ Request::route('id') }}" method="post">
                @csrf
                <div class="flex flex-wrap text-medium my-3">
                    <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                        <div class="mr-3">
                            <label for="" class="text-gray-dark">Name</label>
                            <input type="text" readonly="readonly" value="{{ Auth::user()->name }}" class="py-3 px-4 my-2 text-gray-grayer rounded focus:outline-none border border-gray w-full" >
                        </div>
                    </div>
                    <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                        <div class="mr-2">
                            <label for="" class="text-gray-dark">Email Address</label>
                            <input type="text" readonly="readonly" value="{{ Auth::user()->email }}" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap text-medium my-3">
                    <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                        <div class="mr-3">
                            <label for="" class="text-gray-dark">Phone number</label>
                            <input type="text" placeholder="phone number" value="{{ Auth::user()->profile ? Auth::user()->profile->phone_number : ''}}" name="phone_number" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                        </div>
                        @if ($errors->has('phone_number'))
                            <div class="text-medium text-red" role="alert">
                                {{ $errors->first('phone_number') }}
                            </div>
                        @endif
                    </div>
                    <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                        <div class="mr-3">
                            <label for="" class="text-gray-dark">Address</label>
                            <input type="text" placeholder="address" value="{{ Auth::user()->profile ? Auth::user()->profile->address : '' }}" name="address" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                        </div>
                        @if ($errors->has('address'))
                            <div class="text-medium text-red" role="alert">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-full mb-4 text-medium">
                    <div class="mr-3">
                        <label for="" class="text-gray-dark">Account Name</label>
                        <input type="text" placeholder="account name" value="{{ Auth::user()->profile ? Auth::user()->profile->account_name : '' }}" name="account_name" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                    </div>
                    @if ($errors->has('account_name'))
                        <div class="text-medium text-red" role="alert">
                            {{ $errors->first('account_name') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-wrap text-medium my-3">
                    <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                        <div class="mr-3">
                            <label for="" class="text-gray-dark">Account Number</label>
                            <input type="text" placeholder="account number" value="{{ Auth::user()->profile ? Auth::user()->profile->account_number : ''}}" name="account_number" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                        </div>
                        @if ($errors->has('account_number'))
                            <div class="text-medium text-red" role="alert">
                                {{ $errors->first('account_number') }}
                            </div>
                        @endif
                    </div>
                    <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                        <div class="mr-2">
                            <label for="" class="text-gray-dark">Bank Name</label>
                            <input type="text" placeholder="bank name" value="{{ Auth::user()->profile ? Auth::user()->profile->bank_name : ''}}" name="bank_name" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                        </div>
                        @if ($errors->has('bank_name'))
                            <div class="text-medium text-red" role="alert">
                                {{ $errors->first('bank_name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-48 mx-auto my-4">
                    <button type="submit" class="py-2 rounded px-8 bg-purple-dark shadow text-white">save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
