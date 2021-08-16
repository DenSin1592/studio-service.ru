@if($targetAudiences->count() > 0)

    <section class="section-categories section-dark">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    <div class="section-header">
                        <div class="row">
                            <div class="section-header-typography-container col">
                                <div class="section-title title-h1">Для кого работаем</div>
                            </div>

                            <div class="section-header-controls-container col-auto d-md-none align-self-end">
                                <div
                                    class="swiper-categories-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                    <button type="button"
                                            class="swiper-categories-button-prev swiper-button-prev swiper-button-light d-flex align-items-center justify-content-center">
                                        <svg class="swiper-button-prev-media" width="14" height="14">
                                            <use
                                                xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                                        </svg>
                                    </button>

                                    <button type="button"
                                            class="swiper-categories-button-next swiper-button-next swiper-button-light d-flex align-items-center justify-content-center">
                                        <svg class="swiper-button-next-media" width="14" height="14">
                                            <use
                                                xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-categories-cover swiper-cover">
                        <div class="swiper-categories swiper-container swiper-light">
                            <div class="swiper-wrapper row flex-nowrap">

                                @foreach($targetAudiences as $element)
                                    <div class="swiper-slide col-6 col-sm-4 col-md-3 d-flex justify-content-center">
                                        <a href="{{ $element->url}}" class="card-category text-center text-xxl-left">
                                            <div
                                                class="row align-items-center justify-content-center flex-xxl-nowrap">
                                                <div class="card-category-media-container col-12 col-xxl flex-grow-0">
                                                    <div class="card-category-thumbnail">
                                                        <img loading="lazy"
                                                             src="{{{ $element->getImgPath('icon', 'main', 'no-image-40x40.png') }}}"
                                                             width="48" height="40" alt="{{$element->name}}"
                                                             class="card-category-media">
                                                    </div>
                                                </div>

                                                <div class="card-category-typography-container col-12 col-xxl">
                                                    <div class="card-category-title">{{$element->name}}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>

                            <button type="button"
                                    class="swiper-categories-button-prev swiper-button-prev d-none d-md-flex align-items-center justify-content-center">
                                <svg class="swiper-button-prev-media" width="19" height="19">
                                    <use xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                                </svg>
                            </button>

                            <button type="button"
                                    class="swiper-categories-button-next swiper-button-next d-none d-md-flex align-items-center justify-content-center">
                                <svg class="swiper-button-next-media" width="19" height="19">
                                    <use xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
