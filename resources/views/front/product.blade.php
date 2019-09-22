@extends('layouts.front')

@section('title', $product->name)

@section('content')
    <div class="header-product-bg">
    </div>
<div class="product-main-block">
    <div class="container">
        <div class="wrapper">
            <div class="sidebar col-md-6 col-xs-12 gallery-block noPadding">
                <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        @foreach($product->images as $img)
                            @if( $loop->index == 0 )
                                <div class="item active">
                                    <img src="{{ url('/') }}/{{ $img->url }}" alt="..." class="img-responsive">
                                </div>
                            @endif
                            <div class="item">
                                <img src="{{ url('/') }}/{{ $img->url }}" alt="..." class="img-responsive">
                            </div>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                        <i class="fa fa-chevron-right"></i>
                        <span class="sr-only">Next</span>
                    </a>

                    <!-- Indicators -->
                    <ol class="row carousel-indicators visible-sm-block hidden-xs-block visible-md-block visible-lg-block">
                        @foreach($product->images as $img)
                            @if($loop->index == 0)
                                <li data-target="#carousel-custom" data-slide-to="{{ $loop->index }}" class="active col-md-3 noPadding">
                                    <img src="{{ url('/') }}/{{ $img->url }}" alt="..." class="img-responsive">
                                </li>
                            @else
                                <li data-target="#carousel-custom" data-slide-to="{{ $loop->index }}" class="col-md-3 noPadding">
                                    <img src="{{ url('/') }}/{{ $img->url }}" alt="..." class="img-responsive">
                                </li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="main col-md-6 col-xs-12 product-right-info noPadding">
                <div class="product-padding-section">
                    <h4>{{ $productCategory->name }}</h4>
                    <h1>{{ $product->name }}</h1>
                    @foreach( $characteristics as $chars)
                    <div class="product-technical-info">
                        <div class="row">
                            <div class="col-md-6 col-xs-6 left-block">
                                {{ $chars->key }}
                            </div>
                            <div class="col-md-6 col-xs-6 right-block">
                                {{ $chars->value }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="product-price-block">
                        <div class="row">
                            <!-- <div class="col-md-6 col-xs-6 price">
                                25 000 000 сум
                            </div> -->
                            <div class="col-md-6 col-xs-6 consult">
                                <img src="{{ asset("img/phone_iphone.jpg") }}" alt="">
                                <a href="#!" data-toggle="modal" data-target="#contactUs">@lang('overall.consultation')</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row noPadding">
                    <hr>
                </div>
                <div class="product-description-section productDescription">
                    <h5>@lang('pages.product-text')</h5>
                    {!! $product->description !!}
                </div>
            </div>

        </div>

        <div class="clearfix"></div>
        <div class="popular-products mgr120">
            <h2>@lang('pages.product-useful')</h2>
            <p>@lang('pages.product-useful-desc')</p>
            <div class="row mrg30 padding15">
                @foreach($relatedProducts as $related)
                <div class="col-md-3 col-xs-12 product-view">
                    <div class="product-image">
                        @foreach($related->images as $img)
                        <a href="{{ route('single-product', $related->slug) }}">
                            <div class="image" style="background-image: url('{{ url('/') }}/{{ $img->url }}')"></div>
                        </a>
                        @break
                        @endforeach
                    </div>
                    <div class="product-description blueBg">
                    <h3><a href="{{ route('single-product', $related->slug) }}">{{ $related->name }}</a></h3>
                        <p>{{ $productCategory->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center load-more">
                <a href="{{ route('catalogue') }}"><img src="{{ asset('img/load_more.svg') }}" alt=""></a>
            </div>
        </div>
        <div class="popular-products mgr120">
            <h2>{{ $productCategory->name }}</h2>
            <p>@lang('pages.product-category-desc')</p>
            <div class="row mrg30 padding15">
                @foreach($inThisCat as $item)
                <div class="col-md-3 col-xs-12 product-view">
                    <div class="product-image">
                        @foreach($item->images as $img)
                        <a href="{{ route('single-product', $related->slug) }}">
                            <div class="image" style="background-image: url('{{ url('/') }}/{{ $img->url }}')"></div>
                        </a>
                        @break
                        @endforeach
                    </div>
                    <div class="product-description redBg">
                        <h3><a href="{{ route('single-product', $related->slug) }}">{{ $item->name }}</a></h3>
                            <p>{{ $productCategory->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center load-more">
                <a href="{{ route('catalogue', $productCategory->slug) }}"><img src="{{ asset('img/load_more.svg') }}" alt=""></a>
            </div>
        </div>

    </div>

</div>
@endsection