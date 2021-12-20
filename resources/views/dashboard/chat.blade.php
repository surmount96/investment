@extends('layouts.app')

@section('content')
    <h3 class="font-semibold text-h4 my-6">Have a section with the Administrator</h3>
{{--    {{ $users }}--}}
{{--    @foreach($users as $user)--}}
{{--        {{ $user->chats }}--}}
{{--    @endforeach--}}
    <chat :users="{{ $users }}" />
@endsection
