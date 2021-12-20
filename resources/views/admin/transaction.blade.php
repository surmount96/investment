@extends('layouts.app')

@section('content')
    <h3 class="my-3">Manage Transaction</h3>
    <div class="my-5">
        <table class="w-full text-medium my-5">
            <tr>
                <td class="border border-gray py-3 px-3">User</td>
                <td class="border border-gray py-3 px-3">Investment</td>
                <td class="border border-gray py-3 px-3">Amount(K)</td>
                <td class="border border-gray py-3 px-3">Time</td>
            </tr>
            @if(count($payments))
                @foreach($payments as $payment)
                <tr>
                    <td class="border border-gray py-3 px-3">{{ $payment->user->name }}</td>
                    <td class="border border-gray py-3 px-3">{{ $payment->payment_type }}</td>
                    <td class="border border-gray py-3 px-3">{{ $payment->amount }}</td>
                    <td class="border border-gray py-3 px-3">{{ $payment->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
