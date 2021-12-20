@extends('layouts.app')

@section('content')
    @if(Session('message'))
        <div class="bg-red-100 border-t border-b border-red-500 text-red-700 px-4 py-3" role="alert">
            <p class="font-bold">Error</p>
            <p class="">{{ Session('message') }}</p>
        </div>
    @endif
    <div class="lg:w-2/3 md:w-2/3 w-full lg:mx-auto md:mx-auto mx-2 p-5">
        <div class="shadow-md p-4 rounded-lg flex flex-col items-center justify-center text-white" style="width: 95%; height:220px; background-image:linear-gradient(to bottom, rgba(0,0,0,.4),rgba(0,0,0,.4)), url('{{ asset('img/forex.jpeg') }}'); background-size: cover;">
            <h3 class="text-h4 font-bold text-center">Forex</h3>
            <p class="my-3">Please input the amount you want to invest. </p>
        </div>
        <p class="text-medium text-gray-grayer my-3"><span class="font-bold mr-2">Note:</span>Minimum of <span class="line-through">N</span>100,000</p>
        <form action="{{ route('payment') }}" method="get">
            @csrf
            <input type="hidden" name="investment" value="forex">
            <div class="w-full my-4 text-medium">
                <div class="mr-3">
                    <label for="" class="text-gray-dark">Amount to invest</label>
                    <input type="text" value="100000" name="amount" class="py-3 px-4 w-128 my-2 text-gray-grayer block rounded focus:outline-none border border-gray" >
                </div>
            </div>
            <div class="w-48 mx-auto my-4">
                <button type="submit" class="py-2 rounded px-8 bg-purple-dark shadow text-white">invest</button>
            </div>
        </form>
    </div>
@endsection
