<section class="section-presentation">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="section-header">
                    <div class="section-title title-h1">{{$model->section_tasks_name}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="swiper-presentation-block">
        <div class="swiper-presentation-nav-cover swiper-cover">
            <div class="container">
                <div class="swiper-presentation-nav swiper-container">
                    <div class="swiper-wrapper d-flex flex-nowrap">

                        @foreach($model->service->tasks as $element)
                            <div class="swiper-slide col-auto col-md-2 d-flex">
                            <button type="button" class="swiper-presentation-nav-link d-flex align-items-xl-center" >
                                <div class="form-row">
                                    <div class="swiper-presentation-nav-media-container col-12 col-xxl-auto position-static">
                                        <div class="swiper-presentation-nav-thumbnail d-flex align-items-center justify-content-center">
                                            <img loading="lazy" src="{{$element->getImgPath('icon', null, 'no-image-40x40.png')}}" width="47" height="37" alt="" class="swiper-presentation-nav-media">
                                        </div>
                                    </div>

                                    <div class="swiper-presentation-nav-typography-container col-12 col-xxl position-static">
                                        <div class="swiper-presentation-nav-title"><span class="text-secondary" >{{$loop->iteration}}. </span>{{$element->title}}</div>
                                    </div>
                                </div>
                            </button>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-presentation-cover swiper-cover">
            <div class="swiper-presentation swiper-container swiper-light">
                <div class="swiper-wrapper d-flex flex-nowrap no-gutters">

                    @foreach($model->service->tasks as $element)
                        <div class="swiper-slide col-12">
                        <div class="container">
                            <div class="form-row">
                                <div class="swiper-presentation-typography-container col-12 col-md-6">
                                    <div class="form-row">
                                        <div class="swiper-presentation-counter-container col-2 col-md-3 col-xl-4">
                                            <div class="swiper-presentation-counter-block">
                                                <div class="swiper-presentation-counter text-secondary">{{$loop->iteration}}.</div>
                                            </div>
                                        </div>

                                        <div class="swiper-presentation-content-cotainer col-10 col-sm-8 col-md-9 col-xl-8">
                                            <div class="swiper-presentation-title title-h3">{{$element->text}}</div>
                                            <div class="swiper-presentation-description">{{$element->description}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-presentation-media-container col-10 col-md-5 offset-2 offset-md-1 offset-xxl-0">
                                    <figure class="swiper-presentation-figure">
                                        <img loading="lazy" src="{{$element->getImgPath('image', 'main', 'no-image-500x500.png')}}" width="1012" height="667" alt="" class="swiper-presentation-media">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="swiper-presentation-controls-container">
                    <div class="container">
                        <div class="form-row">
                            <div class="col-10 col-md-6 offset-2 offset-md-0">
                                <div class="form-row">
                                    <div class="col-md-9 col-xxl-8 offset-md-3 offset-xl-4">
                                        <div class="swiper-presentation-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                            <button type="button" class="swiper-presentation-button-prev swiper-button-prev d-flex align-items-center justify-content-center" >
                                                <svg class="swiper-button-prev-media" width="19" height="19">
                                                    <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-left')}}"></use>
                                                </svg>
                                            </button>

                                            <button type="button" class="swiper-presentation-button-next swiper-button-next d-flex align-items-center justify-content-center" >
                                                <svg class="swiper-button-next-media" width="19" height="19">
                                                    <use xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="presentation-cta-block text-center">
                    <button type="button" class="presentation-cta-btn btn btn-xl btn-primary anchor-button" data-target="section-feedback">
                        <svg class="btn-icon" width="31" height="22">
                            <use xlink:href="{{asset('/images/icons/sprite.svg#icon-arrow-to-right')}}"></use>
                        </svg>
                        Отправить заявку
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
