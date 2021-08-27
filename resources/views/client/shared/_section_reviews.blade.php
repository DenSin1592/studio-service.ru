<section class="section-testimonials">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="section-header">
                    <div class="row">
                        <div class="section-header-typography-container col d-flex flex-wrap align-items-center">
                            <div class="section-title title-h1">{{$header}}</div>
                        </div>

                        <div
                            class="section-header-controls-container col-auto d-flex align-items-baseline align-self-end">
                            <div
                                class="swiper-testimonials-pagination-wrapper swiper-pagination-wrapper d-none d-md-block">
                                <div
                                    class="swiper-testimonials-pagination swiper-pagination swiper-pagination-fraction">
                                        <span
                                            class="swiper-testimonials-pagination-current swiper-pagination-current"></span>
                                    <span
                                        class="swiper-testimonials-pagination-total swiper-pagination-total"></span>
                                </div>
                            </div>

                            <div
                                class="swiper-testimonials-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                <button type="button"
                                        class="swiper-testimonials-button-prev swiper-button-prev swiper-button-sm d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-prev-media" width="14" height="14">
                                        <use
                                            xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                                    </svg>
                                </button>

                                <button type="button"
                                        class="swiper-testimonials-button-next swiper-button-next swiper-button-sm d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-next-media" width="14" height="14">
                                        <use
                                            xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-testimonials-cover swiper-cover">
                    <div class="swiper-testimonials swiper-container">
                        <div class="swiper-wrapper row flex-nowrap">

                            @foreach($elements as $element)
                                <div class="swiper-slide col-12">
                                    <div class="card-testimonial">
                                        <div class="row">
                                            <div
                                                class="card-testimonial-media-container col-md-4 col-lg-5 col-xxl-6">
                                                <div class="card-testimonial-thumbnail-cover">
                                                    <a
                                                        @if($element->youtube_link)
                                                        data-fancybox="testimonial-video"
                                                        data-src="{{$element->youtube_link}}"
                                                        @endif

                                                       class="card-testimonial-thumbnail card-testimonial-video-thumbnail @if(!$element->youtube_link) disable @endif">
                                                        <img
                                                            src="{{{ $element->getImgPath('preview_image', 'main', 'no-image-800x800.png') }}}"
                                                            alt="{{$element->name}}"
                                                            class="card-testimonial-media">

                                                        <div
                                                            class="card-testimonial-icon-block d-flex align-items-center justify-content-center">
                                                            <img loading="lazy"
                                                                 src="{{asset('images/icons/general/png/icon-play.png')}}"
                                                                 width="27" height="41" alt=""
                                                                 class="card-testimonial-icon">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div
                                                class="card-testimonial-typography-container col-md-8 col-lg-7 col-xxl-6">
                                                <div
                                                    class="card-testimonial-title title-h3">{{$element->name}}</div>

                                                <div class="card-testimonial-description">{{$element->text}}</div>

                                                @if($element->services->count() > 0 )
                                                    <div class="card-testimonial-services-block">
                                                        <div class="card-testimonial-services-title">Оказанные
                                                            услуги
                                                        </div>

                                                        <ul class="card-testimonial-services-list list-unstyled check-list">

                                                            @foreach($element->services as $elem)
                                                                <li class="list-item">
                                                                    <a href="{{ $elem->url}}"
                                                                       class="list-link">{{ $elem->name}}</a>
                                                                </li>

                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
