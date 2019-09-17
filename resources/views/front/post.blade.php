@extends('layouts.front')

@section('title', 'Heating Energy')

@section('content')

    <div class="content-page mrg30">
        <div class="container">
            <div class="main-content">
                <div class="row">
                    <div class="col-md-7 col-md-offset-1 col-xs-12 article">
                        <h6>@lang('overall.h6')</h6>
                        <h1>{{ $post->title }}

                            <!-- AddToAny BEGIN -->
                            <a class="a2a_dd" href="https://www.addtoany.com/share"><img src="{{ asset('img/share.svg') }}" alt=""></a>
                            <script>
                                var a2a_config = a2a_config || {};
                                a2a_config.num_services = 6;
                            </script>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->


                        </h1>
                        <div class="article-detailed-info">
                            <div class="date">
                                <img src="{{ asset('img/date_range.svg') }}" alt="">
                                <p>{{ $post->date }}</p>
                            </div>
                            <div class="article-views">
                                <img src="{{ asset('img/remove_red_eye.svg.jpg') }}" alt="">
                                <p>{{ $post->views }}</p>
                            </div>
                        </div>
                        <div class="article-full-text">

                            @foreach($post->images as $img)
                            <img src="{{ url('/') }}/{{ $img->url }}" alt="">
                            @endforeach

                            <p>{{ $post->brief }}</p>

                            {!! $post->text !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="blog-section mgr120">
                        <h2>Вас заинтересут</h2>
                        <p>Вы можете найти много полезного в этих статьях</p>
                        <div class="row mrg30">
                            {{dd($recommendations)}}
                            @foreach($recommendations as $item)
                                <div class="col-md-6 col-xs-12 articles">
                                    <div class="article-img">
                                    {{--@foreach($item->images as $img)--}}
                                        {{--<div class="image" style="background-image: url('{{ url('/') }}/{{ $img->url }}')"></div>--}}
                                        {{--@break--}}
                                        {{--@endforeach--}}
                                    </div>
                                    <div class="article-text blueBg">
                                        <h6>@lang('overall.h6')</h6>
                                        <h3><a href="{{ $item->slug }}">{{ $item->title }}</a></h3>
                                        <p>{{ $item->brief }}</p>
                                        <div class="article-info">
                                            <div class="data">
                                                <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.9909 15.6797V6.5H2.39525V15.6797H13.9909ZM13.9909 2.32031C14.4319 2.32031 14.821 2.48958 15.1583 2.82812C15.4955 3.16667 15.6641 3.55729 15.6641 4V15.6797C15.6641 16.1224 15.4955 16.513 15.1583 16.8516C14.821 17.1641 14.4319 17.3203 13.9909 17.3203H2.39525C1.92831 17.3203 1.52622 17.1641 1.18899 16.8516C0.877693 16.513 0.722046 16.1224 0.722046 15.6797V4C0.722046 3.55729 0.877693 3.16667 1.18899 2.82812C1.52622 2.48958 1.92831 2.32031 2.39525 2.32031H3.21239V0.679688H4.88559V2.32031H11.5006V0.679688H13.1738V2.32031H13.9909ZM12.3566 8.17969V9.82031H10.6834V8.17969H12.3566ZM9.01023 8.17969V9.82031H7.37594V8.17969H9.01023ZM5.70274 8.17969V9.82031H4.02954V8.17969H5.70274Z" fill="white" />
                                                </svg>
                                                <span>{{ $item->date }}</span>
                                            </div>
                                            <div class="comments">
                                                <svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.92849 5.24219C8.42137 4.7474 9.00505 4.5 9.67951 4.5C10.354 4.5 10.9377 4.7474 11.4305 5.24219C11.9234 5.73698 12.1699 6.32292 12.1699 7C12.1699 7.67708 11.9234 8.26302 11.4305 8.75781C10.9377 9.2526 10.354 9.5 9.67951 9.5C9.00505 9.5 8.42137 9.2526 7.92849 8.75781C7.43561 8.26302 7.18917 7.67708 7.18917 7C7.18917 6.32292 7.43561 5.73698 7.92849 5.24219ZM6.72223 9.96875C7.55234 10.776 8.53811 11.1797 9.67951 11.1797C10.8209 11.1797 11.7937 10.776 12.5979 9.96875C13.428 9.13542 13.8431 8.14583 13.8431 7C13.8431 5.85417 13.428 4.8776 12.5979 4.07031C11.7937 3.23698 10.8209 2.82031 9.67951 2.82031C8.53811 2.82031 7.55234 3.23698 6.72223 4.07031C5.91806 4.8776 5.51597 5.85417 5.51597 7C5.51597 8.14583 5.91806 9.13542 6.72223 9.96875ZM4.11515 2.46875C5.77538 1.32292 7.63017 0.75 9.67951 0.75C11.7289 0.75 13.5836 1.32292 15.2439 2.46875C16.9041 3.61458 18.0974 5.125 18.8237 7C18.0974 8.875 16.9041 10.3854 15.2439 11.5312C13.5836 12.6771 11.7289 13.25 9.67951 13.25C7.63017 13.25 5.77538 12.6771 4.11515 11.5312C2.45492 10.3854 1.26163 8.875 0.535278 7C1.26163 5.125 2.45492 3.61458 4.11515 2.46875Z" fill="white" />
                                                </svg>
                                                <span>{{ $item->views }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($loop->index < 5)
                                    @break
                                @endif
                            @endforeach

                        <div class="text-center load-more">
                            <a href="#"><img src="{{ asset('img/load_more.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection