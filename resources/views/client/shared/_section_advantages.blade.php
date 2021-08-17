<section class="section-advantages">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">

                {!! $block_advantages !!}

                @if($elements->count() > 0)
                    <div class="advantages-gallery-block">
                        <div class="gallery-block">
                            @if($elements->count() > 1)
                                <div class="gallery-controls-container d-flex align-items-center justify-content-sm-end">
                                    <div class="swiper-gallery-pagination-wrapper swiper-pagination-wrapper">
                                        <div class="swiper-gallery-pagination swiper-pagination swiper-pagination-fraction">
                                            <span class="swiper-gallery-pagination-current swiper-pagination-current"></span>
                                            <span class="swiper-gallery-pagination-total swiper-pagination-total"></span>
                                        </div>
                                    </div>

                                    <div class="swiper-gallery-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                        <button type="button"
                                                class="swiper-gallery-button-prev swiper-button-prev swiper-button-sm d-flex align-items-center justify-content-center">
                                            <svg class="swiper-button-prev-media" width="14" height="14">
                                                <use xlink:href="images/icons/sprite.svg#icon-angle-left"></use>
                                            </svg>
                                        </button>

                                        <button type="button"
                                                class="swiper-gallery-button-next swiper-button-next swiper-button-sm d-flex align-items-center justify-content-center">
                                            <svg class="swiper-button-next-media" width="14" height="14">
                                                <use xlink:href="images/icons/sprite.svg#icon-angle-right"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endif

                            <div class="swiper-gallery-cover swiper-cover">
                                <div class="swiper-gallery swiper-container">
                                    <div class="swiper-wrapper">

                                        @foreach($elements as $element)
                                            <div class="swiper-slide">
                                                <div
                                                    class="gallery-header-container d-flex flex-column justify-content-center">
                                                    <div class="gallery-description">{!! $element->description !!}</div>
                                                </div>

                                                <div class="twentytwenty-container">
                                                    <div class="twentytwenty-block">
                                                        <img src="{{$element->getImgPath('image_before', 'main')}}"
                                                             class="twentytwenty-media" alt="">
                                                        <img src="{{$element->getImgPath('image_after', 'main')}}"
                                                             class="twentytwenty-media" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</section>
