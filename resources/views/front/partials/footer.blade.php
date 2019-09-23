<div class="contact-data mgr120">
    <div class="col-md-7 col-xs-12 map noPadding">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Af5293391baceabaadc5d8edc19cad4f8426a3cb62d021a6ab48da0bfda4fa4c4&amp;width=100%25&amp;height=700&amp;lang=ru_RU&amp;scroll=true"></script>
        <div class="contact-details">
            <div class="col-md-12">
                <div class="row">
                    <div class="contact-block">
                        <div class="col-md-2 col-xs-2">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.72021C8.13 2.72021 5 5.84845 5 9.71627C5 14.9633 12 22.709 12 22.709C12 22.709 19 14.9633 19 9.71627C19 5.84845 15.87 2.72021 12 2.72021ZM12 12.2149C10.62 12.2149 9.5 11.0955 9.5 9.71627C9.5 8.33705 10.62 7.21768 12 7.21768C13.38 7.21768 14.5 8.33705 14.5 9.71627C14.5 11.0955 13.38 12.2149 12 12.2149Z" fill="#B9B9B9"/>
                            </svg>
                        </div>
                        <div class="col-md-10 col-xs-10 contact-info">
                            <h5>@lang('overall.address')</h5>
                            <p>{{ $credential->company_address }}</p>
                        </div>
                    </div>
                    <div class="contact-block">
                        <div class="col-md-2 col-xs-2">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20 4.66455H4C2.9 4.66455 2.01 5.56404 2.01 6.66342L2 18.6566C2 19.756 2.9 20.6555 4 20.6555H20C21.1 20.6555 22 19.756 22 18.6566V6.66342C22 5.56404 21.1 4.66455 20 4.66455ZM20 8.66229L12 13.6595L4 8.66229V6.66342L12 11.6606L20 6.66342V8.66229Z" fill="#B9B9B9"/>
                            </svg>
                        </div>
                        <div class="col-md-10 col-xs-10 contact-info">
                            <h5>Email</h5>
                            <p><a href="mailto:{{ $credential->email }}">{{ $credential->email }}</a></p>
                        </div>
                    </div>
                    <div class="contact-block">
                        <div class="col-md-2 col-xs-2">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.62 11.4094C8.06 14.2378 10.38 16.5465 13.21 17.9957L15.41 15.7969C15.68 15.5271 16.08 15.4371 16.43 15.557C17.55 15.9268 18.76 16.1267 20 16.1267C20.55 16.1267 21 16.5765 21 17.1262V20.6142C21 21.1639 20.55 21.6136 20 21.6136C10.61 21.6136 3 14.0079 3 4.62321C3 4.07353 3.45 3.62378 4 3.62378H7.5C8.05 3.62378 8.5 4.07353 8.5 4.62321C8.5 5.87251 8.7 7.07183 9.07 8.1912C9.18 8.541 9.1 8.93078 8.82 9.21062L6.62 11.4094Z" fill="#B9B9B9"/>
                            </svg>
                        </div>
                        <div class="col-md-10 col-xs-10 contact-info">
                            <h5>@lang('overall.phone')</h5>
                            <p>{{ $credential->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-xs-12 contact-form">
        <h3>@lang('index.feedback-heading')</h3>
        <p>@lang('index.feedback-desc')</p>
        <form action="#!" class="main-form">
            <div class="row">
                <div class="form-group noRightPadding col-md-6 col-xs-12">
                    <input type="text" class="form-control" name="username" placeholder="@lang('overall.name')">
                </div>
                <div class="form-group noLeftPadding col-md-6 col-xs-12">
                    <input type="text" class="form-control" name="phone" placeholder="@lang('overall.phone')">
                </div>
                <div class="form-group text-area col-md-12 col-xs-12">
                    <textarea name="message" cols="" rows="10" class="form-control" placeholder="@lang('overall.text')"></textarea>
                </div>
                <div class="col-md-12">
                    <button class="btn send-message" type="submit">@lang('overall.btn-send')</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="main-content">
            <div class="row">
                <div class="col-md-4 col-xs-12 footer-logo">
                    @foreach($credential->images as $logo)
                        <img src="{{ url('/') }}/{{ $logo->url }}" alt="{{ $credential->company_name }}">
                        @break
                    @endforeach
                    <p>@lang('index.footer-info')</p>
                </div>
                <div class="col-md-3 col-md-offset-1 col-xs-6 footer-links">
                    <h4>@lang('index.footer-other-info')</h4>
                    <ul>
                        <li><a href="#!">Правила и условия</a></li>
                        <li><a href="#!" data-toggle="modal" data-target="#contactUs">@lang('overall.consultation')</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-6 footer-links">
                    <h4>@lang('menu.services')</h4>
                    <ul>
                        <li><a href="#!">Скоро...</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="footer-bottom">
                    <div class="col-md-4 col-xs-12 copyright">
                        © Copyright 2019 Heating<br/> Energy
                    </div>
                    <div class="col-md-5 col-xs-12 footer-menu">
                        <ul>
                            <li><a href="{{ url('/') }}/{{ app()->getLocale() }}/@lang('routes.about')">@lang('menu.about')</a></li>
                            <li><a href="{{ url('/') }}/{{ app()->getLocale() }}/@lang('routes.catalogue')">@lang('menu.catalogue')</a></li>
                            <li><a href="{{ url('/') }}/{{ app()->getLocale() }}/@lang('routes.services')">@lang('menu.services')</a></li>
                            <li><a href="{{ url('/') }}/{{ app()->getLocale() }}/@lang('routes.contacts')">@lang('menu.contacts')</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-12 footer-soc">
                        <ul class="about-social-icnons">
                            <li class="fb"><a href="{{ $credential->facebook }}" target="_blank">
                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M15.5 0C6.93959 0 0 6.93959 0 15.5C0 24.0604 6.93959 31 15.5 31C24.0604 31 31 24.0604 31 15.5C31 6.93959 24.0604 0 15.5 0ZM16.5349 16.4062V25.8332L12.741 25.8333V16.4063H9.56861V12.7324H12.7411V10.023C12.7411 6.87871 14.6614 5.16667 17.4663 5.16667C18.8098 5.16667 19.9646 5.26666 20.3012 5.31127V8.59714L18.3557 8.59804C16.8303 8.59804 16.5349 9.32297 16.5349 10.3866V12.7323H20.173L19.6992 16.4062H16.5349Z" fill="#141414"></path>
                                    </svg>
                                </a></li>
                            <li class="tg"><a href="{{ $credential->telegram }}" target="_blank">
                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.1872 10.8065C20.2098 10.468 19.6455 10.8065 19.6455 10.8065L10.7753 16.4492C10.6398 16.5395 10.5947 16.6975 10.6398 16.8329L11.7007 20.3088C11.7684 20.5119 12.0618 20.4893 12.1069 20.2636L12.3552 18.142C12.3552 18.0517 12.4003 17.984 12.4681 17.9389C13.3257 17.1715 19.7132 11.4385 19.9841 11.1677C20.2775 10.8517 20.1872 10.8065 20.1872 10.8065Z" fill="#d0d0d0"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5 0C6.93959 0 0 6.93959 0 15.5C0 24.0604 6.93959 31 15.5 31C24.0604 31 31 24.0604 31 15.5C31 6.93959 24.0604 0 15.5 0ZM20.4355 22.6561C20.4355 22.6561 20.0292 23.6493 18.9458 23.1753L14.8831 20.0605L12.2649 22.4304C12.2649 22.4304 12.0618 22.5884 11.8361 22.4982C11.8361 22.4982 11.6329 22.4756 11.4072 21.7307C11.1589 20.9633 9.94012 16.9683 9.94012 16.9683L5.89997 15.6141C5.89997 15.6141 5.29056 15.3884 5.22285 14.9144C5.15514 14.4404 5.92254 14.1696 5.92254 14.1696L21.9703 7.87236C21.9703 7.87236 23.2794 7.28552 23.302 8.25606L20.4355 22.6561Z" fill="#d0d0d0"></path>
                                    </svg>

                                </a></li>
                            <li class="wp"><a href="{{ $credential->whatsapp }}" target="_blank">
                                    <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.2">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4716 21.1419L12.7743 21.2885C13.9347 21.9727 15.2969 22.3148 16.659 22.3148C18.0716 22.3148 19.4842 21.9239 20.6446 21.1908C24.277 19.0403 25.3365 14.495 23.1167 10.9761C20.8969 7.45719 16.205 6.43084 12.5725 8.58129C8.9401 10.7317 7.88064 15.3259 10.1005 18.7959L10.3023 19.0892L9.5455 21.875L12.4716 21.1419ZM20.5437 16.6455L21.0987 16.8899C21.1996 16.9387 21.25 16.9876 21.25 16.9876V17.3297C21.1996 17.5741 21.1491 17.8185 21.0482 18.0139C20.9978 18.1117 20.8969 18.2094 20.796 18.3072C20.7455 18.3561 20.6951 18.3927 20.6446 18.4294C20.5942 18.466 20.5437 18.5027 20.4933 18.5516L20.3924 18.6493C20.3357 18.7042 20.279 18.7283 20.2134 18.7561C20.1622 18.7779 20.1056 18.8019 20.0392 18.8448C19.8374 18.9426 19.5347 19.0403 19.2824 19.0403H18.7779C18.7023 19.0159 18.614 19.0036 18.5257 18.9914C18.4374 18.9792 18.3491 18.967 18.2734 18.9426C16.9113 18.6004 15.7005 17.9651 14.641 17.0853C14.5751 16.9896 14.4876 16.9146 14.3927 16.8333C14.3423 16.7901 14.2899 16.7452 14.2374 16.6944L14.0356 16.4989C13.2284 15.7658 12.623 14.9349 12.1689 14.0063L12.1185 13.8597C11.9671 13.5176 11.8662 13.1266 11.8662 12.7356C11.8662 12.198 12.068 11.6603 12.4212 11.2205C12.4716 11.1716 12.5095 11.1227 12.5473 11.0739C12.5851 11.025 12.623 10.9761 12.6734 10.9272C12.7239 10.9028 12.7743 10.8661 12.8248 10.8295C12.8752 10.7928 12.9257 10.7562 12.9761 10.7317L13.0266 10.6829C13.077 10.6829 13.1275 10.6706 13.1779 10.6584C13.2284 10.6462 13.2788 10.634 13.3293 10.634H13.8842C14.0356 10.6829 14.1365 10.7317 14.2374 10.8784C14.3887 11.1716 14.9942 12.4912 15.0446 12.7356C15.0951 12.8822 15.0446 13.0777 14.9437 13.2243C14.8933 13.2732 14.8554 13.3343 14.8176 13.3954C14.7797 13.4565 14.7419 13.5176 14.6915 13.5664C14.5401 13.713 14.3383 13.9574 14.3383 13.9574C14.2878 14.0063 14.2878 14.104 14.2878 14.2018C14.3071 14.2391 14.319 14.2693 14.3292 14.2951C14.3457 14.3369 14.3576 14.3671 14.3887 14.3973L14.4392 14.495C14.6915 14.9349 15.0446 15.3259 15.3978 15.668C15.4482 15.7169 15.5113 15.7658 15.5743 15.8146C15.6374 15.8635 15.7005 15.9124 15.7509 15.9612C16.1545 16.3522 16.659 16.6455 17.214 16.8899L17.4662 16.9876C17.5167 17.0365 17.6176 17.0853 17.668 17.0853H17.7185C17.8194 17.0853 17.9203 17.0365 17.9707 16.9387C18.677 16.1567 18.7275 16.1079 18.7275 16.1079C18.8284 16.059 18.9293 16.0101 19.0806 16.0101C19.1059 16.0101 19.1311 16.0223 19.1563 16.0346C19.1815 16.0468 19.2068 16.059 19.232 16.059C19.7365 16.3034 20.5437 16.6455 20.5437 16.6455Z" fill="#141414"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 0C7.16344 0 0 6.93959 0 15.5C0 24.0604 7.16344 31 16 31C24.8366 31 32 24.0604 32 15.5C32 6.93959 24.8366 0 16 0ZM16.659 5.89323C19.0806 5.89323 21.4518 6.82183 23.1671 8.53242C24.8824 10.1941 25.841 12.4423 25.841 14.8371C25.841 19.7734 21.7041 23.8299 16.6086 23.8299C15.0951 23.8299 13.5815 23.4878 12.2194 22.7547L7.32568 23.9766L8.6374 19.3335C7.88064 17.9651 7.42658 16.45 7.42658 14.886C7.37613 9.94976 11.5131 5.89323 16.659 5.89323Z" fill="#141414"></path>
                                        </g>
                                    </svg>
                                </a></li>
                            <li class="in"><a href="{{ $credential->instagram }}" target="_blank">
                                    <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.2">
                                            <path d="M15.0004 12.2706C13.2745 12.2706 11.8759 13.7166 11.8759 15.5C11.8759 17.2834 13.2745 18.7294 15.0004 18.7294C16.7262 18.7294 18.1256 17.2834 18.1256 15.5C18.1256 13.7166 16.7262 12.2706 15.0004 12.2706Z" fill="#141414"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.4719 23.0521C9.80205 23.1851 10.2988 23.3424 11.2129 23.3854C12.2008 23.4324 12.4968 23.4417 15.0004 23.4417C17.5039 23.4417 17.8008 23.4324 18.789 23.3854C19.703 23.3425 20.2 23.1851 20.53 23.0521C20.9677 22.8761 21.2804 22.666 21.6083 22.3275C21.9362 21.989 22.1392 21.6663 22.3096 21.214C22.4374 20.8728 22.5904 20.3595 22.6321 19.415C22.6775 18.393 22.6866 18.0871 22.6866 15.5001C22.6866 12.913 22.6775 12.6072 22.6321 11.5852C22.5905 10.6407 22.4383 10.1272 22.3096 9.78616C22.1392 9.33387 21.9367 9.01069 21.6083 8.67186C21.28 8.33303 20.9677 8.12254 20.53 7.94724C20.199 7.81549 19.703 7.657 18.789 7.61399C17.8 7.5678 17.5028 7.55764 15.0004 7.55764C12.4979 7.55764 12.2011 7.56702 11.2129 7.61399C10.2988 7.65692 9.8019 7.81425 9.4719 7.94724C9.03345 8.12254 8.72145 8.33257 8.39355 8.67186C8.06565 9.01116 7.8627 9.33387 7.6923 9.78616C7.5648 10.1282 7.41142 10.6407 7.3698 11.5852C7.3251 12.6072 7.31527 12.913 7.31527 15.5001C7.31527 18.0871 7.32435 18.3939 7.3698 19.415C7.41135 20.3595 7.5636 20.873 7.6923 21.214C7.86195 21.6663 8.0652 21.9887 8.39355 22.3275C8.7219 22.6663 9.0342 22.8761 9.4719 23.0521ZM15.0004 20.4744C12.3416 20.4744 10.1864 18.2474 10.1864 15.5C10.1864 12.7526 12.3416 10.5256 15.0004 10.5256C17.6591 10.5256 19.8143 12.7526 19.8143 15.5C19.8143 18.2474 17.6591 20.4744 15.0004 20.4744ZM19.0692 10.9743C18.9457 10.7831 18.8798 10.5583 18.8799 10.3283C18.8802 10.0202 18.9988 9.72467 19.2097 9.50679C19.4206 9.28892 19.7066 9.16646 20.0049 9.16631C20.2274 9.1664 20.4453 9.23467 20.6303 9.36249C20.8152 9.4903 20.9594 9.67192 21.0444 9.88437C21.1295 10.0968 21.1517 10.3306 21.1082 10.5561C21.0647 10.7815 20.9575 10.9886 20.8001 11.1512C20.6427 11.3137 20.4422 11.4243 20.2239 11.4691C20.0057 11.5138 19.7795 11.4907 19.574 11.4026C19.3684 11.3146 19.1928 11.1655 19.0692 10.9743Z" fill="#141414"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 0C6.71573 0 0 6.93959 0 15.5C0 24.0604 6.71573 31 15 31C23.2843 31 30 24.0604 30 15.5C30 6.93959 23.2843 0 15 0ZM8.85967 6.32113C9.45525 6.08166 10.1372 5.91813 11.1352 5.87117C12.1354 5.82343 12.4552 5.8125 15.0011 5.8125C17.5471 5.8125 17.8666 5.8242 18.8662 5.87117C19.8635 5.91736 20.5451 6.08166 21.1418 6.32113C21.7575 6.56843 22.2808 6.89936 22.8018 7.43853C23.3227 7.97769 23.6431 8.51764 23.8831 9.15461C24.1149 9.77004 24.2731 10.4747 24.3186 11.506C24.364 12.539 24.3746 12.8692 24.3746 15.5C24.3746 18.1308 24.364 18.4603 24.3186 19.494C24.2739 20.5253 24.1149 21.2296 23.8831 21.8454C23.6431 22.4824 23.3236 23.0232 22.8018 23.5615C22.28 24.0998 21.7575 24.4309 21.1411 24.6789C20.5451 24.9183 19.8636 25.0819 18.8655 25.1288C17.8659 25.1766 17.5463 25.1875 15.0004 25.1875C12.4544 25.1875 12.1354 25.1758 11.1352 25.1288C10.1372 25.0819 9.45637 24.9183 8.85967 24.6789C8.24287 24.4309 7.72065 24.0996 7.19895 23.5615C6.67725 23.0234 6.35692 22.4824 6.1176 21.8454C5.88585 21.2296 5.7276 20.5253 5.68215 19.494C5.63595 18.461 5.62537 18.1308 5.62537 15.5C5.62537 12.8692 5.63595 12.539 5.68215 11.506C5.7276 10.4747 5.88585 9.77042 6.1176 9.15461C6.35692 8.51725 6.67717 7.97684 7.19895 7.43853C7.72072 6.90021 8.24287 6.56843 8.85967 6.32113Z" fill="#141414"></path>
                                        </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="contactUs" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h2>@lang('overall.consultation-heading')</h2>
                <p>@lang('overall.consultation-desc')</p>
                <form action="#!" id="consult-form" class="popup-form form-inline">
                    <div class="row">
                        <div class="form-group col-md-6 col-xs-12">
                            <input type="text" id="c-name" class="form-control" placeholder="@lang('overall.name')">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <input type="text" id="c-phone" class="form-control" placeholder="@lang('overall.phone')">
                        </div>
                        <div class="col-md-12">
                            <button class="btn send-message" type="submit" id="consult-me">@lang('overall.btn-send')</button>
                        </div>
                        <div id="response">
                            <pre></pre>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset("vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js") }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $("#consult-me").on('click', function(e){
        let name = $('#c-name').val();
        let phone = $('#c-phone').val();
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ route('consultation') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                name:name,
                phone:phone},
            success: function(success){
                $("#div1").html(success);
            }});
    });
</script>
<script src="{{ asset('vendor/jquery.mask.min.js') }}"></script>
<script> $('#c-phone').mask('+000(00)000-00-00');</script>
</body>
</html>