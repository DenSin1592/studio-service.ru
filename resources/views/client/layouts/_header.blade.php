<header class="header-box is-fixed compensate-for-scrollbar">
    <div class="container">
        <div class="row flex-nowrap align-items-center">
            <div class="header-nav-container col-auto col-md order-md-1">
                <button type="button"
                        class="offcanvas-toggle d-flex d-xl-none align-items-center justify-content-center mx-auto ml-lg-0">
                    <div class="offcanvas-toggle-media">
                        <svg class="offcanvas-toggle-icon" width="20" height="20">
                            <use xlink:href="{{asset('images/icons/sprite.svg#icon-bars')}}"></use>
                        </svg>
                    </div>
                    <div class="offcanvas-toggle-text d-none d-md-block">Меню</div>
                </button>

                @if(count($topMenu) > 0)
                    <nav class="header-nav-block d-none d-xl-block">
                        <ul class="header-nav-list d-flex flex-wrap justify-content-center list-unstyled">
                            @foreach($topMenu as $menuElement)
                                <li class="header-nav-item {{ $menuElement['active']  ? 'active' : '' }}">
                                    <a href="{{ $menuElement['url'] }}"
                                       class="header-nav-link">{!! $menuElement['name'] !!}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                @endif
            </div>

            <div class="header-logo-container col-auto col-lg-4 col-xl-auto order-md-0">
                <a href="{{route('home')}}" class="header-logo-block d-flex align-items-center">
                    <div class="header-logo-thumbnail">
                        <img src="{{asset('images/logo.svg')}}" alt="Студия-Сервис" width="94" height="87" class="header-logo-media">
                    </div>

                    <div class="header-logo-content d-none d-md-block">
                        <div class="header-logo-title text-nowrap"><b>Студия-</b>Сервис</div>
                    </div>
                </a>
            </div>

            @if(trim(Setting::get("site_content.phone")) !== '')
                <div class="header-contact-container col col-md-auto d-flex flex-column align-items-center order-md-3">
                    <div class="header-contact-block">
                        <a href="tel:{!! Setting::get("site_content.phone") !!}"
                           class="header-contact-link">{!! Setting::get("site_content.phone") !!}</a>
                    </div>
                </div>
            @endif

            <div class="header-social-container col-auto order-md-2">
                <div class="header-social-block">
                    <ul class="header-social-list d-flex flex-wrap list-unstyled">
                        <li class="header-social-item">
                            <a {{Setting::get("site_content.telegram_phone") ? 'href=https://t.me/' . Setting::get("site_content.telegram_phone") .' '. 'target="_blank"' :'href=javascript:void(0);'}} class="header-social-link" >
                                <img src="{{asset('images/icons/social/icon-social-telegram.svg')}}" width="40" height="40"
                                     alt="Telegram" class="header-social-media">
                            </a>
                        </li>

                        <li class="header-social-item">
                            <a {{Setting::get("site_content.wa_phone") ? 'href=https://wa.me/' . Setting::get("site_content.wa_phone") .' '. 'target="_blank"' :'href=javascript:void(0);'}} class="header-social-link" >
                                <img src="{{asset('images/icons/social/icon-social-whatsapp.svg')}}" width="40" height="40"
                                     alt="Whatsapp" class="header-social-media">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

