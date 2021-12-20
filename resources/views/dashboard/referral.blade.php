@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap">
        <div class="lg:w-1/2 md:w-1/2 w-full my-10">
            <h3 class="mb-4">You were referred by</h3>
            <form action="">
                <div class="">
                    <input type="text" readonly="readonly" value="{{ Auth::user()->affiliate_id }}" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                </div>
                <button type="submit">

                </button>
            </form>
        </div>
        <div class="lg:w-1/2 md:w-1/2 w-full my-10">
            <h3 class="mb-4">Below is your referral id</h3>
            {{--            <p class="text-medium">Note: How it works</p>--}}
            <form action="">
                <div class="w-full mb-4 text-medium">
                    <div class="mr-2">
                        <input type="text" readonly="readonly" value="{{ Auth::user()->affiliate_id }}" class="py-3 px-4 my-2 text-gray-grayer  rounded focus:outline-none border border-gray w-full" >
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
