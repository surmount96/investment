@extends('layouts.app')

@section('content')
    <h3 class="my-3">Manage Users</h3>
    @if(Session('message'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="">{{ Session('message') }}</p>
        </div>
    @endif
    <div class="my-5">
        @if(count($users)>0)
        <table class="w-full text-medium my-5">
            <tr>
                <td class="border border-gray py-3 px-3">Name</td>
                <td class="border border-gray py-3 px-3">Email</td>
                <td class="border border-gray py-3 px-3">Payment</td>
            </tr>
            @foreach($users as $user)
            <tr>
                <td class="border border-gray py-3 px-3">{{ $user->name }}</td>
                <td class="border border-gray py-3 px-3">{{ $user->email }}</td>
                <td class="border border-gray py-3 px-3">
                    @if(count($user->payments)>0)
                        @foreach($user->payments as $payment)
                            <div class="flex flex-wrap">
                                <div class="lg:w-1/2 md:w-1/2 w-full">
                                    <p class="border border-gray py-3 px-3"><span class="line-through">N</span>{{ $payment->amount  }}</p>
                                </div>
                                <div class="lg:w-1/2 md:w-1/2 w-full">
                                    <p class="border border-gray py-3 px-3">{{ $payment->payment_type  }}</p>
                                </div>
                            </div>
                        @endforeach
                        @else
                        {{  'Yet to subscribe' }}
                    @endif
                </td>
                <td class="border border-gray py-3 px-3 flex">
                    <a href="/admin/user/{{ $user->id }}" class="mx-3 ">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="pencil-alt text-blue w-5 h-6"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                    </a>
                    <form action="/user/{{ $user->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="trash text-red w-5 h-6"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
@endsection

