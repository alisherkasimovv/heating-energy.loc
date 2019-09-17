@extends('layouts.front')

@section('title', 'Heating Energy')

@section('content')
<div class="content-page mrg30">
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="article-top-search-form col-md-5 col-md-offset-1 col-xs-12">
                    <h2>@lang('index.blog-heading')</h2>
                    <p>@lang('index.blog-desc')</p>
                    <form class="form-inline search-form" action="/action_page.php">
                        <div class="form-group">
                            <input class="form-control" placeholder="Поиск...">
                            <button class="search-button" type="submit">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.27344 10.5859C6.0026 11.3151 6.88802 11.6797 7.92969 11.6797C8.97135 11.6797 9.85677 11.3151 10.5859 10.5859C11.3151 9.85677 11.6797 8.97135 11.6797 7.92969C11.6797 6.88802 11.3151 6.0026 10.5859 5.27344C9.85677 4.54427 8.97135 4.17969 7.92969 4.17969C6.88802 4.17969 6.0026 4.54427 5.27344 5.27344C4.54427 6.0026 4.17969 6.88802 4.17969 7.92969C4.17969 8.97135 4.54427 9.85677 5.27344 10.5859ZM12.9297 11.6797L17.0703 15.8203L15.8203 17.0703L11.6797 12.9297V12.2656L11.4453 12.0312C10.4557 12.8906 9.28385 13.3203 7.92969 13.3203C6.41927 13.3203 5.13021 12.7995 4.0625 11.7578C3.02083 10.7161 2.5 9.4401 2.5 7.92969C2.5 6.41927 3.02083 5.14323 4.0625 4.10156C5.13021 3.03385 6.41927 2.5 7.92969 2.5C9.4401 2.5 10.7161 3.03385 11.7578 4.10156C12.7995 5.14323 13.3203 6.41927 13.3203 7.92969C13.3203 9.28385 12.8906 10.4557 12.0312 11.4453L12.2656 11.6797H12.9297Z" fill="white" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                <div class="articles-list">
                    <div class="row">
                    @foreach( $posts as $post )
                            {{--<script>console.log({{ $loop->index }})</script>--}}
                        @if($loop->index == 0 || $loop->index == 5 || $loop->index == 6)
                        <div class="col-md-5 col-xs-12 noPadding article-blocks">
                            <div class="col-md-12 full-height-article">
                                <div class="article-img">
                                    @foreach($post->images as $img)
                                        <div class="image" style="background-image: url('{{ url('/') }}/{{ $img->url }}') "></div>
                                        @break
                                    @endforeach
                                </div>
                                <div class="article-text redBg">
                                    <h6>@lang('overall.h6')</h6>
                                    <h3><a href="{{ route('blog') }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                    <p>{!! str_limit($post->brief, $limit = 80, $end = '...') !!}</p>
                                    <div class="article-info">
                                        <div class="data">
                                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9909 15.6797V6.5H2.39525V15.6797H13.9909ZM13.9909 2.32031C14.4319 2.32031 14.821 2.48958 15.1583 2.82812C15.4955 3.16667 15.6641 3.55729 15.6641 4V15.6797C15.6641 16.1224 15.4955 16.513 15.1583 16.8516C14.821 17.1641 14.4319 17.3203 13.9909 17.3203H2.39525C1.92831 17.3203 1.52622 17.1641 1.18899 16.8516C0.877693 16.513 0.722046 16.1224 0.722046 15.6797V4C0.722046 3.55729 0.877693 3.16667 1.18899 2.82812C1.52622 2.48958 1.92831 2.32031 2.39525 2.32031H3.21239V0.679688H4.88559V2.32031H11.5006V0.679688H13.1738V2.32031H13.9909ZM12.3566 8.17969V9.82031H10.6834V8.17969H12.3566ZM9.01023 8.17969V9.82031H7.37594V8.17969H9.01023ZM5.70274 8.17969V9.82031H4.02954V8.17969H5.70274Z" fill="white" />
                                            </svg>
                                            <span>{{ $post->date }}</span>
                                        </div>
                                        <div class="comments">
                                            <svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.92849 5.24219C8.42137 4.7474 9.00505 4.5 9.67951 4.5C10.354 4.5 10.9377 4.7474 11.4305 5.24219C11.9234 5.73698 12.1699 6.32292 12.1699 7C12.1699 7.67708 11.9234 8.26302 11.4305 8.75781C10.9377 9.2526 10.354 9.5 9.67951 9.5C9.00505 9.5 8.42137 9.2526 7.92849 8.75781C7.43561 8.26302 7.18917 7.67708 7.18917 7C7.18917 6.32292 7.43561 5.73698 7.92849 5.24219ZM6.72223 9.96875C7.55234 10.776 8.53811 11.1797 9.67951 11.1797C10.8209 11.1797 11.7937 10.776 12.5979 9.96875C13.428 9.13542 13.8431 8.14583 13.8431 7C13.8431 5.85417 13.428 4.8776 12.5979 4.07031C11.7937 3.23698 10.8209 2.82031 9.67951 2.82031C8.53811 2.82031 7.55234 3.23698 6.72223 4.07031C5.91806 4.8776 5.51597 5.85417 5.51597 7C5.51597 8.14583 5.91806 9.13542 6.72223 9.96875ZM4.11515 2.46875C5.77538 1.32292 7.63017 0.75 9.67951 0.75C11.7289 0.75 13.5836 1.32292 15.2439 2.46875C16.9041 3.61458 18.0974 5.125 18.8237 7C18.0974 8.875 16.9041 10.3854 15.2439 11.5312C13.5836 12.6771 11.7289 13.25 9.67951 13.25C7.63017 13.25 5.77538 12.6771 4.11515 11.5312C2.45492 10.3854 1.26163 8.875 0.535278 7C1.26163 5.125 2.45492 3.61458 4.11515 2.46875Z" fill="white" />
                                            </svg>
                                            <span>{{ $post->views }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xs-12 noPadding article-blocks">
                        @else
                            <div class="col-md-12 col-xs-12 articles">
                                <div class="article-img">
                                    @foreach($post->images as $img)
                                        <div class="image" style="background-image: url('{{ url('/') }}/{{ $img->url }}') "></div>
                                        @break
                                    @endforeach
                                </div>
                                <div class="article-text blueBg">
                                    <h6>@lang('overall.h6')</h6>
                                    <h3><a href="{{ route('blog') }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
                                    <p>{!! str_limit($post->brief, $limit = 80, $end = '...') !!}</p>
                                    <div class="article-info">
                                        <div class="data">
                                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9909 15.6797V6.5H2.39525V15.6797H13.9909ZM13.9909 2.32031C14.4319 2.32031 14.821 2.48958 15.1583 2.82812C15.4955 3.16667 15.6641 3.55729 15.6641 4V15.6797C15.6641 16.1224 15.4955 16.513 15.1583 16.8516C14.821 17.1641 14.4319 17.3203 13.9909 17.3203H2.39525C1.92831 17.3203 1.52622 17.1641 1.18899 16.8516C0.877693 16.513 0.722046 16.1224 0.722046 15.6797V4C0.722046 3.55729 0.877693 3.16667 1.18899 2.82812C1.52622 2.48958 1.92831 2.32031 2.39525 2.32031H3.21239V0.679688H4.88559V2.32031H11.5006V0.679688H13.1738V2.32031H13.9909ZM12.3566 8.17969V9.82031H10.6834V8.17969H12.3566ZM9.01023 8.17969V9.82031H7.37594V8.17969H9.01023ZM5.70274 8.17969V9.82031H4.02954V8.17969H5.70274Z" fill="white" />
                                            </svg>
                                            <span>{{ $post->date }}</span>
                                        </div>
                                        <div class="comments">
                                            <svg width="19" height="14" viewBox="0 0 19 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.92849 5.24219C8.42137 4.7474 9.00505 4.5 9.67951 4.5C10.354 4.5 10.9377 4.7474 11.4305 5.24219C11.9234 5.73698 12.1699 6.32292 12.1699 7C12.1699 7.67708 11.9234 8.26302 11.4305 8.75781C10.9377 9.2526 10.354 9.5 9.67951 9.5C9.00505 9.5 8.42137 9.2526 7.92849 8.75781C7.43561 8.26302 7.18917 7.67708 7.18917 7C7.18917 6.32292 7.43561 5.73698 7.92849 5.24219ZM6.72223 9.96875C7.55234 10.776 8.53811 11.1797 9.67951 11.1797C10.8209 11.1797 11.7937 10.776 12.5979 9.96875C13.428 9.13542 13.8431 8.14583 13.8431 7C13.8431 5.85417 13.428 4.8776 12.5979 4.07031C11.7937 3.23698 10.8209 2.82031 9.67951 2.82031C8.53811 2.82031 7.55234 3.23698 6.72223 4.07031C5.91806 4.8776 5.51597 5.85417 5.51597 7C5.51597 8.14583 5.91806 9.13542 6.72223 9.96875ZM4.11515 2.46875C5.77538 1.32292 7.63017 0.75 9.67951 0.75C11.7289 0.75 13.5836 1.32292 15.2439 2.46875C16.9041 3.61458 18.0974 5.125 18.8237 7C18.0974 8.875 16.9041 10.3854 15.2439 11.5312C13.5836 12.6771 11.7289 13.25 9.67951 13.25C7.63017 13.25 5.77538 12.6771 4.11515 11.5312C2.45492 10.3854 1.26163 8.875 0.535278 7C1.26163 5.125 2.45492 3.61458 4.11515 2.46875Z" fill="white" />
                                            </svg>
                                            <span>{{ $post->views }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @if($loop->index == 4 || $loop->index == 9)
                        </div>
                        @elseif( $loop->index == 2 || $loop->index == 8 )
                            </div><div class="col-md-7 col-xs-12 noPadding article-blocks">
                        @endif
                    @endforeach

                        <div class="col-md-7 col-xs-12 noPadding article-blocks">
                            <div class="col-md-12 col-xs-12 articles plainBlock">
                                <div class="informational-block">
                                    <h2>Получай еще больше!</h2>
                                    <p>Не нужно email адресов! Вы сможете получать еще больше новостей просто включив уведомления.</p>
                                    <div class="agree-button">
                                        <a href="#!" class="notify-button">
                                            <div class="left-arrow">
                                                <img src="images/notifications_active.svg" alt="">
                                            </div>Отлично!
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {

                                // Select and loop the container element of the elements you want to equalise
                                $('.articles-list').each(function() {
                                    // Cache the highest
                                    var highestBox = 0;
                                    // Select and loop the elements you want to equalise
                                    $('.article-blocks', this).each(function() {
                                        // If this box is higher than the cached highest then store it
                                        if ($(this).height() > highestBox) {
                                            highestBox = $(this).height();
                                        }
                                    });
                                    // Set the height of all those children to whichever was highest
                                    $('.article-blocks', this).height(highestBox);
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection