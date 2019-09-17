@extends('layouts.front')

@section('title', 'Development')

@section('content')

    <div class="content-page mgr100">
        <div class="container">
            <div class="main-content mgr120 development text-center">
                <img src="{{ asset('img/development.svg') }}" alt="">
                <h3>@lang('overall.dev-header')</h3>
                <p>@lang('overall.dev-desc')</p>
                {{--<a href="#!" class="notify-button">--}}
                    {{--<div class="left-arrow">--}}
                        {{--<img src="images/notifications_active.svg" alt="">--}}
                    {{--</div>Уведомить меня--}}
                {{--</a>--}}
            </div>
        </div>
    </div>

@endsection