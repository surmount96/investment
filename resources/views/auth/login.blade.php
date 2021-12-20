@extends('layouts.master')

@section('content')
    <div class="flex flex-wrap">
        <div class="lg:w-1/2 md:w-1/2 lg:flex md:flex lg:flex-col md:flex-col hidden w-full p-12" style="height: 100vh">
            <div class="w">
                <img src="{{ asset('img/logo.png') }}" alt="" class="w-64">
            </div>
            <div class="">
                <img src="{{ asset('img/arrived.svg') }}" alt="">
            </div>
        </div>
        <div class="lg:w-1/2 md:w-1/2 w-full lg:bg-purple-100 md:bg-purple-100 bg-white">
            <div class=" lg:ml-auto md:ml-auto lg:block md:block flex flex-wrap justify-between items-center">
                <div class="lg:hidden md:hidden">
                    <img src="{{ asset('img/logo.png') }}" alt="" class="w-64">
                </div>
                <div class="lg:w-6/12 md:w-6/12 sm:w-5/12 py-3 ml-auto lg:flex md:flex hidden">
                    <a href="/login" class="rounded-l-full lg:bg-yellow md:bg-yellow bg-purple-100 text-white py-2 px-8">sign in</a>
                    <a href="/register" class="rounded-r-full lg:bg-purple-dark md:bg-purple-dark bg-purple-100 text-gray-500 py-2 px-8">sign up</a>
                </div>
            </div>
            <div class="lg:px-20 md:px-12 px-4 py-10">
                <h3 class="lg:text-white md:text-white text-gray-darker text-h4 mt-2 lg:font-normal md:font-normal font-semibold">Welcome back,</h3>
                <p  class="lg:text-white md:text-white text-gray-darker text-medium mt-3"> Your gateway to a richer life..</p>
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="lg:mt-16 md:mt-16 mt-8 ">
                        <label for="" class="lg:text-gray-400 md:text-gray-400 text-gray-darker text-body-2">EMAIL</label>
                        <input type="email" class="text-medium lg:placeholder-gray-500 md:placeholder-gray-500 placeholder-gray-darker lg:rounded-none md:rounded-none rounded-md lg:text-gray-500 md:text-gray-500 text-gray-darker  focus:outline-none focus:bg-transparent lg:border-b lg:border-t-0  lg:border-r-0 lg:border-l-0  md:border-t-0 md:border-r-0 md:border-l-0 md:border-b border-b border-t border-r border-l border-gray lg:px-0 md:px-0 px-4  bg-transparent lg:pb-4 md:pb-4 py-4 w-full mt-3 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter your email" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback text-red" role="alert">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group lg:mt-12 md:mt-12 mt-5">
                        <label for="" class="lg:text-gray-400 md:text-gray-400 text-gray-darker text-body-2">PASSWORD</label>
                        <input type="password" class="text-medium lg:placeholder-gray-500 md:placeholder-gray-500 lg:rounded-none md:rounded-none rounded-md placeholder-gray-darker lg:text-gray-500 md:text-gray-500 text-gray-darker focus:outline-none focus:bg-transparent lg:border-b lg:border-t-0  lg:border-r-0 lg:border-l-0  md:border-t-0 md:border-r-0 md:border-l-0 md:border-b border-b border-t border-r border-l border-gray lg:px-0 md:px-0 px-4  bg-transparent lg:pb-4 md:pb-4 py-4 w-full mt-3 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="**********" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback text-red" role="alert">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="text-body-2 lg:bg-yellow md:bg-yellow bg-purple-100 rounded-full text-white w-40 py-3 my-4">Sign in</button>
                    <div class="row">
                        <div class="col-12 text-right">
                            <a class="text-sky-blue text-body-2 " href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="flex">
                            <span class="lg:text-white md:text-white">New user?</span>
                            <a class="lg:text-white md:text-white text-sky-blue text-body-2 " href="/register">
                                {{ __('Create account') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


