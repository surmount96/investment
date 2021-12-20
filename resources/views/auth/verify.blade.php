@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center" style="height:80vh">
        <div class=""><svg class="w-8" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>   </div>
        <h3 class="font-bold mb-1">{{ __('Verify Your Email Address') }}</h3>
        <p>{{ __('A fresh verification link has been sent to your email address.') }}</p>
        @if (session('resent'))
            <p>{{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
            </p>
        @endif
        <div class="w-full text-center mt-4">
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="bg-green rounded py-3 w-64 text-white ">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
@endsection
