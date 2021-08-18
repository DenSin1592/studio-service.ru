<section class="section-hero section-dark"
         style="background-image: url({{asset('images/sections/section-hero/section-hero-bg.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="row">
                    <div class="hero-typography-container col-12 col-md-7 col-xxl-8">
                        <div class="row">
                            <div class="col-10 col-sm-8 col-md-12">
                                <h1 class="hero-title">{!! $metaData['h1'] !!}</h1>
                                <div class="hero-description">{{$page->description_after_header}}</div>
                            </div>
                        </div>
                        <div class="hero-actions-block">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="hero-cta-block">
                                        <button type="button" class="hero-cta-btn btn btn-lg btn-primary"
                                                data-toggle="modal" data-target="#modalCallback">
                                            <svg class="btn-icon" width="31" height="22">
                                                <use xlink:href="images/icons/sprite.svg#icon-arrow-to-right"></use>
                                            </svg>
                                            Отправить заявку
                                        </button>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <ul class="hero-social-list list-unstyled d-flex flex-wrap">
                                        <li class="hero-social-item">
                                            <a href="https://t.me/{!! Setting::get("site_content.telegram_phone") !!}"
                                               class="hero-social-link d-flex align-items-center justify-content-center"
                                               target="_blank">
                                                <svg class="hero-social-media" width="22" height="22">
                                                    <use xlink:href="{{asset('images/icons/sprite.svg#icon-telegram')}}"></use>
                                                </svg>
                                            </a>
                                        </li>

                                        <li class="hero-social-item">
                                            <a href="https://wa.me/{!! Setting::get("site_content.wa_phone") !!}"
                                               class="hero-social-link d-flex align-items-center justify-content-center"
                                               target="_blank">
                                                <svg class="hero-social-media" width="31" height="31">
                                                    <use xlink:href="{{asset('images/icons/sprite.svg#icon-whatsapp')}}"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="hero-media-container col-12 col-md-5 col-xl-5 col-xxl-5 offset-md-7 offset-xl-6 d-flex align-items-end justify-content-center">
                        <figure class="hero-media-figure">
                            <img loading="lazy" src="{{asset('images/sections/section-hero/section-hero-media-2.png')}}"
                                 width="860" height="755" alt="" class="hero-media">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
