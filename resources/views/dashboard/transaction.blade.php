@extends('layouts.app')

@section('content')
    <h3 class="text-center text-h4 my-3">Transactions</h3>

    <div class="my-5">
        @if(count($payments) > 0)
        <table class="w-full text-medium my-5">
            <tr>
                <td class="border border-gray py-3 px-3">Investment</td>
                <td class="border border-gray py-3 px-3">Amount(K)</td>
                <td class="border border-gray py-3 px-3">Reference</td>
                <td class="border border-gray py-3 px-3">Time</td>
            </tr>
            @foreach($payments as $payment)
                <tr>
                    <td class="border border-gray py-3 px-3">{{ $payment->payment_type }}</td>
                    <td class="border border-gray py-3 px-3">{{ $payment->amount }}</td>
                    <td class="border border-gray py-3 px-3">{{ $payment->txn_ref }}</td>
                    <td class="border border-gray py-3 px-3">{{ $payment->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </table>
            @else
            <div class="lg:w-9/12 md:w-9/12 w-full mx-auto mb-4">
                <div class="shadow-md p-4 rounded-lg" style="width: 95%; height:190px">
                    <div class="justify-center flex items-center" style="height: 80%">
                        <p>No transaction history</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
