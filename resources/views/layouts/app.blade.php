<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Investment By Kilenra') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="text-gray-darker">
        <main class="">
            <div class="flex flex-wrap relative">
                <div class="relative">
                    <div class="fixed z-50 lg:inline-block md:inline-block" style="width:350px" v-show="show" :class="{'hidden':!show, 'block': show}">
                        <div class="bg-white text-dark mr-16 flex flex-col justify-between shadow" style="height: 100vh">
                            <div class="flex flex-col ">
                                <ul class="mb-6">
                                    <li class=" mt-5">
                                        <div class="w-6/12 mx-auto">
                                            <a href="/">
                                                <img src="{{asset('img/logo.png')}}" alt="logo" class="logo text-center block">
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="pt-5 text-medium">
                                    <li class="w-6/12 mx-auto">
                                        <a href="/dashboard"  class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="view-grid w-6 h-6"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                            </div>
                                            <div class="ml-2">Dashboard</div>
                                        </a>

                                    </li>
                                    <li  class=" w-6/12 mx-auto">
                                        <a href="/user/chat" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="chat w-6 h-6"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ml-2"> Chat</div>
                                        </a>
                                    </li>
                                    @role('Member')
                                    <li class=" w-6/12 mx-auto">
                                        <a href="/user/transaction" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="color-swatch w-6 h-6"><path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ml-2">Transaction</div>
                                        </a>

                                    </li>
                                    {{--                                <li  class=" w-6/12 mx-auto">--}}
                                    {{--                                    <a href="/user/investment" class="flex items-center py-5 text-gray-darker">--}}
                                    {{--                                        <div class="">--}}
                                    {{--                                            <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="save w-6 h-6"><path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z"></path></svg>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="ml-2"> Investment</div>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    <li  class=" w-6/12 mx-auto">
                                        <a href="/user/investment" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="currency-dollar w-6 h-6"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ml-2"> Investment</div>
                                        </a>
                                    </li>
{{--                                    <li  class=" w-6/12 mx-auto">--}}
{{--                                        <a href="#" class="flex items-center py-5 text-gray-darker">--}}
{{--                                            <div class="">--}}
{{--                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="currency-dollar w-6 h-6"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>--}}
{{--                                            </div>--}}
{{--                                            <div class="ml-2"> Referral</div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
                                    <li  class=" w-6/12 mx-auto">
                                        <a href="/user/profile/{{ Auth::user()->id }}" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg viewBox="0 0 20 20" fill="currentColor" class="user text-gray-darker w-5 h-6"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ml-2"> Profile</div>
                                        </a>
                                    </li>
                                    <li class=" w-6/12 mx-auto">
                                        <a href="/user/terms" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="color-swatch w-6 h-6"><path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ml-2"> Terms</div>
                                        </a>

                                    </li>
                                    @endrole
                                    @role('Administrator')
                                    <li  class=" w-6/12 mx-auto">
                                        <a href="/admin/users" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg viewBox="0 0 20 20" fill="currentColor" class="users w-5 text-gray-darker h-6"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                                            </div>
                                            <div class="ml-2"> Manage Users</div>
                                        </a>
                                    </li>
                                    <li  class=" w-6/12 mx-auto">
                                        <a href="/admin/investment" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="currency-dollar w-6 h-6"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ml-2"> Investment</div>
                                        </a>
                                    </li>
                                    <li class=" w-6/12 mx-auto">
                                        <a href="/admin/transaction" class="flex items-center py-5 text-gray-darker">
                                            <div class="">
                                                <svg class="text-gray-darker w-5" viewBox="0 0 20 20" fill="currentColor" class="color-swatch w-6 h-6"><path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <div class="ml-2">Transaction</div>
                                        </a>

                                    </li>
                                    @endrole
                                    <li class=" w-6/12 mx-auto">
                                        <a class="py-5 flex items-center text-gray-darker" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit()">
                                            <div class="">
                                                <img src="{{ asset('img/icons/power.svg') }}" alt="power" class="w-5" >
                                            </div>
                                            <div class="ml-2">

                                                Logout
                                            </div>
                                        </a>
                                        <form action="{{route('logout')}}" method="post" id="logout" style="display: none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fixed cursor-pointer ml-5 mt-4 w-6 z-50 bg-white" :class="{'ml-64':show}" @click="menuControl">
                        <span class="" v-if="!show"><img src="{{ asset('img/menu.svg') }}" alt=""></span>
                        <span class="text-h3" v-else>&times;</span>
                    </div>
                </div>
                <div class=" w-full right-0 lg:mx-0 md:mx-0 mx-4 lg:mr-6 md:mr-6 pb-6 px-5" style="margin-l: -1.7rem" :class="{'lg:absolute md:absolute lg:w-9/12 md:w-9/12 ': show}">
                    <div class="">
                        @include('dashboard.navbar')
                    </div>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <script>

    </script>
</body>
</html>
