<section class="section-services">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="section-header">
                    <div class="row">
                        <div class="section-header-typography-container col d-flex flex-wrap align-items-center">
                            <div class="section-title title-h1">{{$header}}</div>

                            @if ($visibleSeeAllLink)
                                <a href="{{route('services')}}"
                                   class="section-header-cta btn btn-outline-secondary">Смотреть все</a>
                            @endif

                        </div>

                        <div class="section-header-controls-container col-auto d-md-none align-self-end">
                            <div
                                class="swiper-services-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                <button type="button"
                                        class="swiper-services-button-prev swiper-button-prev d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-prev-media" width="14" height="14">
                                        <use
                                            xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                                    </svg>
                                </button>

                                <button type="button"
                                        class="swiper-services-button-next swiper-button-next d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-next-media" width="14" height="14">
                                        <use
                                            xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-services-cover swiper-cover">
                    <div class="swiper-services swiper-container">
                        <div class="swiper-wrapper row flex-nowrap m-0">

                            @foreach($elements as $model)
                                <div class="swiper-slide col-auto col-sm-6 col-md-4 col-xl-4 d-flex">

                                    @include('client.shared.services._card', ['blackTaskIcon' => false, 'seeTaskDescriptionTooltip' => false])

                                </div>
                            @endforeach

                        </div>

                        <button type="button"
                                class="swiper-services-button-prev swiper-button-prev d-none d-md-flex align-items-center justify-content-center">
                            <svg class="swiper-button-prev-media" width="19" height="19">
                                <use xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                            </svg>
                        </button>

                        <button type="button"
                                class="swiper-services-button-next swiper-button-next d-none d-md-flex align-items-center justify-content-center">
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
