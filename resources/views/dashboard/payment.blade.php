@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        @csrf
        <div class="">
            <div class="lg:w-2/3 md:w-2/3 lg:mx-auto md:mx-auto">
                <div class="text-center mt-16">
                    <h3 class="text-purple font-bold text-h3 mb-6">Summary</h3>
                    <p>The total cost of the investment plan you chose</p>
                    <p><span class="line-through">N</span> {{ $amt }}</p>
                    <div class="">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}"> {{-- required --}}
                        <input type="hidden" name="amount" value="{{ $amt*100 }}"> {{-- required in kobo --}}
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['investment' => Session::get('investment'),]) }}" >  {{-- For other necessary things you want to add to your payload. it is optional though--}}
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                    </div>
                    <div>
                        <button class="bg-yellow w-48 mx-auto my-8 py-2 flex justify-center text-white" type="submit" value="Pay Now!">
                            <svg class="text-white w-6 mr-3" viewBox="0 0 20 20" fill="currentColor" class="cash w-6 h-6"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                            Pay Now!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
