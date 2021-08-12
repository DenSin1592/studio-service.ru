@if($projects->count() > 0)

    <section class="section-projects">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    <div class="section-header">
                        <div class="row">
                            <div
                                class="section-header-typography-container col d-flex flex-wrap align-items-center">
                                <div class="section-title title-h1">{{$h1}}</div>
                            </div>

                            <div
                                class="section-header-controls-container col-auto d-flex d-md-none align-items-baseline align-self-end">
                                <div
                                    class="swiper-projects-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                    <button type="button"
                                            class="swiper-projects-button-prev swiper-button-prev d-flex align-items-center justify-content-center">
                                        <svg class="swiper-button-prev-media" width="14" height="14">
                                            <use
                                                xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                                        </svg>
                                    </button>

                                    <button type="button"
                                            class="swiper-projects-button-next swiper-button-next d-flex align-items-center justify-content-center">
                                        <svg class="swiper-button-next-media" width="14" height="14">
                                            <use
                                                xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-projects-cover swiper-cover">
            <div class="swiper-projects swiper-container swiper-light">
                <div class="swiper-wrapper">

                    @foreach($projects as $element)
                        <div class="swiper-slide">
                            <div class="card-project">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xxl-10 offset-xxl-1">
                                            <div class="row">
                                                <div class="card-project-media-container col-12 col-md-6 order-md-1">
                                                    <div class="card-project-thumnbnail">
                                                        <img
                                                            src="{{{ $element->getImgPath('preview_image', 'main', 'no-image-800x800.png') }}}"
                                                            alt="{{$element->name}}s"
                                                            class="card-project-media">
                                                    </div>
                                                </div>

                                                <div
                                                    class="card-project-typography-container col-12 col-md-6 order-md-0">
                                                    <a href="{{$element->url}}"
                                                       class="card-project-title title-h3">{{$element->name}}</a>

                                                    <div class="card-project-description">{{mb_strimwidth($element->preview, 0, 240, '...')}}
                                                    </div>

                                                    @if($element->services->count() > 0)
                                                        <div class="card-project-services-block">
                                                            <div class="card-project-services-title">Оказанные услуги
                                                            </div>

                                                            <ul class="card-project-services-list list-unstyled check-list">

                                                                @foreach($element->services as $elem)
                                                                    <li class="list-item">
                                                                        <a href="{{ $elem->url}}"
                                                                           class="list-link">{{$elem->name}}</a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <a href="{{ $element->url}}"
                                                       class="card-project-cta btn btn-outline-secondary">Более подробно
                                                        о проекте</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <button type="button"
                        class="swiper-projects-button-prev swiper-button-prev d-none d-md-flex align-items-center justify-content-center">
                    <svg class="swiper-button-prev-media" width="19" height="19">
                        <use xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                    </svg>
                </button>

                <button type="button"
                        class="swiper-projects-button-next swiper-button-next d-none d-md-flex align-items-center justify-content-center">
                    <svg class="swiper-button-next-media" width="19" height="19">
                        <use xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                    </svg>
                </button>
            </div>
        </div>
    </section>

@endif
