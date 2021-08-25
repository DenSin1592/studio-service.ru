<section class="section-service section-dark" style="background-image: url('{{$model->getImgPath('header_block_background_image', 'main')}}')" >
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="row">
                    <div class="service-typography-container col-12 col-md-7 col-xxl-8">

                        @include('client.shared.breadcrumbs._breadcrumbs')

                        <div class="row">
                            <div class="col-10 col-sm-8 col-md-12">
                                <h1 class="service-title title-h1">{!! $metaData['h1'] !!}</h1>
                            </div>
                        </div>

                        {!! $model->achievements_block !!}

                        <div class="service-actions-block">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <button type="button" class="service-cta-btn btn btn-lg btn-primary anchor-button" data-target="section-feedback">
                                        <svg class="btn-icon" width="31" height="22">
                                            <use xlink:href="{{asset('/images/icons/sprite.svg#icon-arrow-to-right')}}"></use>
                                        </svg>
                                        Отправить заявку
                                    </button>
                                </div>

                                <div class="col-auto">
                                    <ul class="service-social-list social-list list-unstyled d-flex flex-wrap">
                                        <li class="social-item">
                                            <a href="https://t.me/{!! Setting::get("site_content.telegram_phone") !!}" class="social-link d-flex align-items-center justify-content-center">
                                                <svg class="social-media" width="22" height="22">
                                                    <use xlink:href="{{asset('/images/icons/sprite.svg#icon-telegram')}}"></use>
                                                </svg>
                                            </a>
                                        </li>

                                        <li class="social-item">
                                            <a href="https://wa.me/{!! Setting::get("site_content.wa_phone") !!}" class="social-link d-flex align-items-center justify-content-center">
                                                <svg class="social-media" width="31" height="31">
                                                    <use xlink:href="{{asset('/images/icons/sprite.svg#icon-whatsapp')}}"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-media-container col-12 col-md-5 col-xl-5 col-xxl-5 offset-8 offset-sm-5 offset-md-7 offset-xxl-8 d-flex align-items-start justify-content-center">
                        <figure class="service-media-figure" >
                            <img loading="lazy" src="{{$model->getImgPath('image_right_from_header', 'main')}}" width="664" height="558" alt="" class="service-media">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
