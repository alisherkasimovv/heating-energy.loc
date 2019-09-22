<div class="header">
    <div class="languages">
        <ul>
            <li class="active">
                <a href="{{ route('lang.switch', "ru") }}">
                    <img src="{{ asset("img/ru.svg") }}" alt="">
                </a>
            </li>
            <li>
                <a href="{{ route('lang.switch', "en") }}">
                    <img src="{{ asset("img/eng.svg") }}" alt="">
                </a>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="logo">
                <a href="{{ url('/') }}">
                    @foreach($credential->images as $logo)
                        <img src="{{ url('/') }}/{{ $logo->url }}" alt="{{ $credential->company_name }}">
                        @break
                    @endforeach
                </a>
            </div>
            <div class="navigation">
                <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                        <button onclick="clickedIt()" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <script>
                                function clickedIt() {
                                    var image = document.getElementById('myImg');

                                    var canSee = $("#myNavbar").is(":visible");
                                    if(canSee){
                                        image.src = "{{ asset("img/menu.svg") }}";
                                    }
                                    else{
                                        image.src = "{{ asset("img/close.svg") }}";
                                    }
                                }
                            </script>
                            <img src="{{ asset("img/menu.svg") }}" id="myImg" alt="">
                        </button>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav" id="myNavbar">
                            <li>
							<span class="navigation-icon">
								<img src="{{ asset("img/call.svg") }}" alt="">
							</span>
                                <a href="{{ route('about') }}">@lang('menu.about')</a></li>
                            <li class="active dropdown">
			            	<span class="navigation-icon">
								<img src="{{ asset("img/layers.svg") }}" alt="">
							</span>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#!">@lang('menu.catalogue')
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach( $categories as $cat )
                                        <li><a href="{{ route('filter', $cat->slug) }}">{{ $cat->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
							<span class="navigation-icon">
								<img src="{{ asset("img/settings.svg") }}" alt="">
							</span>
                                <a href="{{ route('services') }}">@lang('menu.services')</a>
                            </li>
                            <li>
							<span class="navigation-icon">
								<img src="{{ asset("img/group.svg") }}" alt="">
							</span>
                                <a href="{{ route('blog') }}">@lang('menu.posts')</a>
                            </li>
                        </ul>
                        <div class="mobileCall">
                            <div class="phone-number">
                                {{ $credential->phone }}
                            </div>
                            <div class="order-call">
                                <span><img src="{{ asset("img/phone_iphone.svg") }}" alt=""></span>
                                <a href="#!" data-toggle="modal" data-target="#contactUs">@lang('overall.consultation')</a>
                            </div>
                        </div>
                    </div><!--/.nav-collapse -->
                </nav>
            </div>
            <script>
                $('.dropdown-toggle').click(function(e) {
                    if ($(document).width() > 768) {
                        e.preventDefault();
                        var url = $(this).attr('href');

                        if (url !== '#') {
                            window.location.href = url;
                        }

                    }
                });
            </script>
            <div class="call-info">
                <div class="phone-number">
                    {{ $credential->phone }}
                </div>
                <div class="order-call">
                    <span><img src="{{ asset("img/call.svg") }}" alt=""></span>
                    <a href="#!" data-toggle="modal" data-target="#contactUs">@lang('overall.consultation')</a>
                </div>
            </div>
        </div>
    </div>

</div>