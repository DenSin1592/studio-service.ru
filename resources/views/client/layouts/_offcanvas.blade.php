<!-- Offcanvas -->
<div class="offcanvas-wrapper d-none d-xl-none">

    <div class="offcanvas-header">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="offcanvas-close-container col-auto">
                    <button type="button" class="offcanvas-close d-flex align-items-center justify-content-center" >
                        <svg aria-hidden="true" class="modal-close-media" width="20" height="20">
                            <use xlink:href="{{asset('images/icons/sprite.svg#icon-close')}}"></use>
                        </svg>
                    </button>
                </div>

                <div class="offcanvas-logo-container col-auto">
                    <a href="{{route('home')}}" class="offcanvas-logo-block d-flex align-items-center">
                        <div class="offcanvas-logo-thumbnail">
                            <img src="{{asset('images/logo.svg')}}" alt="Студия-Сервис" width="61" height="56" class="offcanvas-logo-media">
                        </div>

                        <div class="offcanvas-logo-content">
                            <div class="offcanvas-logo-title text-nowrap"><b>Студия-</b>Сервис</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas-statusbar">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="offcanvas-social-container col-auto">
                    <ul class="offcanvas-social-list d-flex flex-wrap list-unstyled">
                        <li class="offcanvas-social-item">
                            <a {{Setting::get("site_content.telegram_phone") ? 'href=https://t.me/' . Setting::get("site_content.telegram_phone") .' '. 'target="_blank"' :'href=javascript:void(0);'}} class="offcanvas-social-link">
                                <img src="{{asset('images/icons/social/icon-social-telegram.svg')}}" width="35" height="35" alt="Telegram" class="offcanvas-social-media">
                            </a>
                        </li>

                        <li class="offcanvas-social-item">
                            <a {{Setting::get("site_content.wa_phone") ? 'href=https://wa.me/' . Setting::get("site_content.wa_phone") .' '. 'target="_blank"' :'href=javascript:void(0);'}} class="offcanvas-social-link">
                                <img src="{{asset('images/icons/social/icon-social-whatsapp.svg')}}" width="35" height="35" alt="Whatsapp" class="offcanvas-social-media">
                            </a>
                        </li>
                    </ul>
                </div>

                @if(trim(Setting::get("site_content.phone")) !== '')
                <div class="offcanvas-contact-container col-auto">
                    <div class="offcanvas-contact-block">
                        <a href="tel:{!! Setting::get("site_content.phone") !!}" class="offcanvas-contact-link">{!! Setting::get("site_content.phone") !!}</a>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

    @if(count($topMenu) > 0)
        <div class="offcanvas-navigation">
            <div class="container-fluid">
                <nav class="offcanvas-nav-block">
                    <ul class="offcanvas-nav-list d-flex flex-column list-unstyled text-center">
                @foreach($topMenu as $menuElement)
                    <li class="offcanvas-nav-item {{ $menuElement['active']  ? 'active' : '' }}">
                        <a href="{{ $menuElement['url'] }}"
                           class="offcanvas-nav-link">{!! $menuElement['name'] !!}</a>
                    </li>
                @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    @endif

</div>
