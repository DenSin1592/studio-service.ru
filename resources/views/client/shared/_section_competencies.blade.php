<section class="section-expertises section-dark"
         style="background-image: url('{{asset('images/sections/section-expertises/section-expertises-bg.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="section-header">
                    <div class="row">
                        <div class="section-header-typography-container col d-flex flex-wrap align-items-center">
                            <div class="section-title title-h1">{{$header}}</div>
                            @if ($visibleSeeAllLink)
                            <a href="{{route('competencies')}}"
                               class="section-header-cta btn btn-outline-secondary">Смотреть все</a>
                             @endif
                        </div>

                        <div class="section-header-controls-container col-auto d-md-none align-self-end">
                            <div class="swiper-expertise-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                <button type="button" class="swiper-expertises-button-prev swiper-button-prev swiper-button-light d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-prev-media" width="14" height="14">
                                        <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-left')}}}"></use>
                                    </svg>
                                </button>

                                <button type="button" class="swiper-expertises-button-next swiper-button-next swiper-button-light d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-next-media" width="14" height="14">
                                        <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-right')}}"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-expertises-cover swiper-cover swiper-light">
                    <div class="swiper-expertises swiper-container">
                        <div class="swiper-wrapper row flex-nowrap">

                            @foreach($elements as $model)
                                <div class="swiper-slide col-6 col-sm-4 col-md-3 d-flex">

                                    @include('client.shared.competencies._card')

                                </div>
                            @endforeach

                        </div>

                        <button type="button"
                                class="swiper-expertises-button-prev swiper-button-prev d-none d-md-flex align-items-center justify-content-center">
                            <svg class="swiper-button-prev-media" width="19" height="19">
                                <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-left')}}"></use>
                            </svg>
                        </button>

                        <button type="button"
                                class="swiper-expertises-button-next swiper-button-next d-none d-md-flex align-items-center justify-content-center">
                            <svg class="swiper-button-next-media" width="19" height="19">
                                <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-right')}}"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
