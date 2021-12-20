@extends('layouts.app')

@section('content')
    <h3 class="text-center text-h4 my-10">Update user's info</h3>
    @if(Session('message'))
        <div class="mx-8">
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="">{{ Session('message') }}</p>
            </div>
        </div>
    @endif
    <div class="w-48 ml-auto my-4">
        <button class="py-2 px-10 rounded w- bg-orange shadow text-white" @click="pay">pay</button>
    </div>
    <form action="/admin/profile/{{ Request::route('id') }}" method="post">
        @csrf
        <div class="flex flex-wrap text-medium my-3">
            <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                <div class="mr-3">
                    <label for="" class="text-gray-dark">Name</label>
                    <input type="text" readonly="readonly" value="{{ $user->name }}" class="py-3 px-4 my-2 text-gray-grayer rounded focus:outline-none border border-gray w-full" >
                </div>
            </div>
            <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                <div class="mr-2">
                    <label for="" class="text-gray-dark">Email Address</label>
                    <input type="text" readonly="readonly" value="{{ $user->email }}" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                </div>
            </div>
        </div>
        <div class="flex flex-wrap text-medium my-3">
            <div class="lg:w-1/2 md:w-1/2 w-full mb-4">
                <div class="mr-3">
                    <label for="" class="text-gray-dark">Phone number</label>
                    <input type="text" placeholder="phone number" value="{{ $user->profile ? $user->profile->phone_number : ''}}" name="phone_number" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
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
                    <input type="text" placeholder="address" value="{{ $user->profile ? $user->profile->address : '' }}" name="address" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
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
                <input type="text" placeholder="account name"  value="{{ $user->profile ? $user->profile->account_name : '' }}" name="account_name" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
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
                    <input type="text" placeholder="account number" value="{{ $user->profile ? $user->profile->account_number : ''}}" name="account_number" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
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
                    <input type="text" placeholder="bank name" value="{{ $user->profile ? $user->profile->bank_name : ''}}" name="bank_name" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
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
    <v-dialog />
@endsection
