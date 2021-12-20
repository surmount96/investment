@extends('layouts.app')

@section('content')
    <h3 class="text-large font-bold text-gray-dark mb-4">Choose an investment option</h3>
    <div class="my-3">
        <div class="flex flex-wrap">
            <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full mb-4">
                <a href="/user/investment/forex">
                    <div class="shadow-md p-4 rounded-lg flex items-center justify-center text-white" style="width: 95%; height:190px; background-image:linear-gradient(to bottom, rgba(0,0,0,.4),rgba(0,0,0,.4)), url('{{ asset('img/forex.jpeg') }}'); background-size: cover;">
                        <div class="px-3 text-medium text-center">
                            <h3 class=" mb-2 font-bold">Forex</h3>
                            <p class="text-large text-center font-bold  font-light flex items-center">with minimum of <span class="line-through ml-2"> N</span>100,000</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full mb-4">
                <a href="#">
                    <div class="shadow-md p-4 rounded-lg flex items-center justify-center text-white" style="width: 95%; height:190px; background-image:linear-gradient(to bottom, rgba(0,0,0,.4),rgba(0,0,0,.4)), url('{{ asset('img/farm_land-2.jpg') }}'); background-size: cover;">
                        <div class="px-3 text-medium text-center">
                            <h3 class=" mb-2">Agriculture</h3>
                            <p class="text-large text-center font-bold  font-light flex items-center">coming soon</p>
                        </div>
                    </div>
                </a>
{{--                <form action="{{ route('payment') }}">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="investment" value="real-estate">--}}
{{--                    <input type="hidden" name="amount" value="120000">--}}
{{--                </form>--}}
            </div>
            <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full mb-4">
                <a href="#">
                    <div class="shadow-md p-4 rounded-lg flex items-center justify-center text-white" style="width: 95%; height:190px; background-image:linear-gradient(to bottom, rgba(0,0,0,.4),rgba(0,0,0,.4)), url('{{ asset('img/estate-3.jpg') }}'); background-size: cover;">
                        <div class="px-3 text-medium text-center">
                            <h3 class=" mb-2">Real estate </h3>
                            <p class="text-large text-center font-bold  font-light flex items-center">coming soon</p>
                        </div>
                    </div>
                </a>
            </div>
{{--            <div class="lg:w-1/3 md:w-1/3 sm:w-1/2 w-full mb-4">--}}
{{--                <a href="#">--}}
{{--                    <div class="shadow-md p-4 rounded-lg flex items-center justify-center text-white" style="width: 95%; height:190px; background-image:linear-gradient(to bottom, rgba(0,0,0,.4),rgba(0,0,0,.4)), url('{{ asset('img/estate-3.jpg') }}'); background-size: cover;">--}}
{{--                        <div class="px-3 text-medium text-center">--}}
{{--                            <h3 class=" mb-2">Fixed Income</h3>--}}
{{--                            <p class="text-large text-center font-bold  font-light flex items-center">coming soon</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </div>
    <invest-modal>
        <div class="lg:w-2/3 md:w-2/3 lg:mx-auto md:mx-auto mx-5 bg-white lg:h-128 md:h-128 h-64 p overflow-y-scroll lg:my-16 md:my-16 my-2" style="width: 90%" >
            <div class="p-6">
                <div class="text-medium " >
                    <h3 class="text-center text-h4 block">TERMS AND CONDITIONS</h3>
                    <h3 class="text-warning my-3 font-bold" style="letter-spacing: 1px;">
                        RISK WARNING!
                    </h3>
                    <p style="line-height: 34px">
                        Investing in leveraged products such as Forex Markets may not be suitable for all investors as they carry a high degree of risk to your capital. We are skilled and professional traders, but Please ensure that you fully understand the risks involved, taking into account your investments objectives and level of experience, before investing, as investments are at your own risk.
                    </p>

                    <p style="line-height: 34px">
                        In account in which our Forex trading partner isn't able to pay as at when due, in cases including;

                    </p>
                    <ul class="my-3" style="line-height: 34px">
                        <li>
                            (a) financial difficulty due to unmanageable debt, as a result of losses in Forex trading, can not or does not pay the debt when it is due.
                        </li>
                        <li>
                            (b) peradventure our Forex Trading firm records a huge loss, or declares bankruptcy.
                        </li>
                    </ul>

                    <p style="line-height: 34px">
                        <strong> Resolution: We pay nothing back to the investor, or</strong>
                    </p>
                    <p style="line-height: 34px">
                        <strong> Issue out a relief fund of ONLY 5% of capital invested only (within 3 Months), as everyone bares the risk .</strong>
                    </p>
                </div>
                <div class="">
                    <input type="checkbox" name="" id="accept">
                    <label for="accept" class="px-12 bg-orange text-white py-2 cursor-pointer" @click="hideInvest">accept</label>
                </div>

            </div>
        </div>
    </invest-modal>
{{--    <vodal :show="invest" animation="rotate" @hide="invest = false"  :height="600" :width="'auto'">--}}
{{--        <div class="p-6">--}}
{{--            <div class="text-medium overflow-y-scroll h-128" >--}}
{{--                <h3 class="text-center text-h4 block">TERMS AND CONDITIONS</h3>--}}
{{--                <h3 class="text-warning my-3 font-bold" style="letter-spacing: 1px;">--}}
{{--                    RISK WARNING!--}}
{{--                </h3>--}}
{{--                <p style="line-height: 34px">--}}
{{--                    Investing in leveraged products such as Forex Markets may not be suitable for all investors as they carry a high degree of risk to your capital. We are skilled and professional traders, but Please ensure that you fully understand the risks involved, taking into account your investments objectives and level of experience, before investing, as investments are at your own risk.--}}
{{--                </p>--}}

{{--                <p style="line-height: 34px">--}}
{{--                    In account in which our Forex trading partner isn't able to pay as at when due, in cases including;--}}

{{--                </p>--}}
{{--                <ul class="my-3" style="line-height: 34px">--}}
{{--                    <li>--}}
{{--                        (a) financial difficulty due to unmanageable debt, as a result of losses in Forex trading, can not or does not pay the debt when it is due.--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        (b) peradventure our Forex Trading firm records a huge loss, or declares bankruptcy.--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--               <p style="line-height: 34px">--}}
{{--                   <strong> Resolution: We pay nothing back to the investor, or</strong>--}}
{{--               </p>--}}
{{--                <p style="line-height: 34px">--}}
{{--                    <strong> Issue out a relief fund of ONLY 5% of capital invested only (within 3 Months), as everyone bares the risk .</strong>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <input type="checkbox" name="" id="accept">--}}
{{--                <label for="accept" class="px-12 bg-orange text-white py-2 " @click="hideInvest">accept</label>--}}
{{--                <button >Accept</button>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </vodal>--}}
@endsection
