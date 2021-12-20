@extends('layouts.master')

@section('content')
    <div class="flex flex-wrap">
        <div  class="lg:w-1/2 md:w-1/2 lg:flex md:flex lg:flex-col md:flex-col hidden w-full p-12" style="height: 100vh">
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
                    <a href="/login"  class="rounded-l-full lg:bg-purple-dark md:bg-purple-dark bg-purple-100 text-gray-500  py-2 px-8">sign in</a>
                    <a href="/register"  class="rounded-r-full bg-yellow text-white py-2 px-8">sign up</a>
                </div>
            </div>
            <div class="lg:px-20 md:px-12 px-4 py-3">
                <h3 class="lg:text-white md:text-white text-gray-darker text-h4 mt-2">Sign up,</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mt-8 ">
                        <label for="" class="lg:text-gray-400 md:text-gray-400 text-gray-darker text-body-2">FULLNAME</label>
                        <input type="name" class="text-medium lg:placeholder-gray-500 md:placeholder-gray-500 placeholder-gray-darker lg:rounded-none md:rounded-none rounded-md lg:text-gray-500 md:text-gray-500 text-gray-darker  focus:outline-none focus:bg-transparent lg:border-b lg:border-t-0  lg:border-r-0 lg:border-l-0  md:border-t-0 md:border-r-0 md:border-l-0 md:border-b border-b border-t border-r border-l border-gray bg-transparent lg:pb-4 md:pb-4 py-4 lg:px-0 md:px-0 px-4  w-full mt-3 @error('name') is-invalid @enderror" name="name" placeholder="Enter your full name" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback text-red" role="alert">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="mt-6 ">
                        <label for="" class="lg:text-gray-400 md:text-gray-400 text-gray-darker text-body-2">EMAIL</label>
                        <input type="email" class="text-medium lg:placeholder-gray-500 md:placeholder-gray-500 placeholder-gray-darker lg:rounded-none md:rounded-none rounded-md lg:text-gray-500 md:text-gray-500 text-gray-darker  focus:outline-none focus:bg-transparent lg:border-b lg:border-t-0  lg:border-r-0 lg:border-l-0  md:border-t-0 md:border-r-0 md:border-l-0 md:border-b border-b border-t border-r border-l border-gray bg-transparent lg:pb-4 md:pb-4 py-4 lg:px-0 md:px-0 px-4 w-full mt-3 @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" required>


                        @if ($errors->has('email'))
                            <span class="invalid-feedback text-red" role="alert">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group mt-6">
                        <label for="" class="lg:text-gray-400 md:text-gray-400 text-gray-darker text-body-2">PASSWORD</label>
                        <input type="password" class="text-medium lg:placeholder-gray-500 md:placeholder-gray-500 placeholder-gray-darker lg:rounded-none md:rounded-none rounded-md lg:text-gray-500 md:text-gray-500 text-gray-darker focus:outline-none focus:bg-transparent lg:border-b lg:border-t-0  lg:border-r-0 lg:border-l-0  md:border-t-0 md:border-r-0 md:border-l-0 md:border-b border-b border-t border-r border-l border-gray bg-transparent lg:pb-4 md:pb-4 py-4 lg:px-0 md:px-0 px-4 w-full mt-3 @error('password') is-invalid @enderror" name="password" placeholder="**********" required>


                        @if ($errors->has('password'))
                            <span class="invalid-feedback text-red" role="alert">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group mt-6">
                        <label for="password-confirm" class="lg:text-gray-400 md:text-gray-400 text-gray-darker  text-body-2">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="text-medium lg:placeholder-gray-500 md:placeholder-gray-500 placeholder-gray-darker lg:rounded-none md:rounded-none rounded-md lg:text-gray-500 md:text-gray-500 text-gray-darker focus:outline-none focus:bg-transparent lg:border-b lg:border-t-0  lg:border-r-0 lg:border-l-0  md:border-t-0 md:border-r-0 md:border-l-0 md:border-b border-b border-t border-r border-l border-gray bg-transparent lg:pb-4 md:pb-4 py-4 lg:px-0 md:px-0 px-4 w-full mt-3 @error('password') is-invalid @enderror" placeholder="**********" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="submit" class="shadow text-body-2 lg:bg-yellow md:bg-yellow bg-purple-100 rounded-full text-white w-40 py-3 my-4">{{ __('Register') }}</button>
                        <div class="col-12 text-right">
                            <a class="lg:text-gray-500 md:text-gray-500 text-gray-darker text-body-2 " href="{{ route('login') }}">
                                {{ __('Already a member') }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

