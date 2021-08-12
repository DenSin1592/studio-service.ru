@extends('client.layouts.default')

@section('body_class')
    class="page-project page-extended d-flex flex-column"
@stop

@section('content')

    <section class="section-project">
        <section class="section-project-hero section-dark" style="background-image: url({{$model->getImgPath('header_block_background_image', 'main')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-10 offset-xxl-1">

                        @include('client.shared.breadcrumbs._breadcrumbs')

                        <div class="project-header">
                            <h1 class="project-title title-h1">{!! $metaData['h1'] !!}</h1>
                        </div>

                        <div class="project-summary">
                            <div class="form-row flex-md-nowrap">

                                @if($model->services->count() > 0)
                                    <div class="project-counter-container col-12 col-md-auto">
                                        <div class="project-counter-block d-inline-block d-md-block">
                                            <div class="project-counter-header d-flex align-items-center">
                                                <div
                                                    class="project-counter-value title-h2 text-purple">{{$model->services->count() . ' ' . \Lang::choice('услуга|услуги|услуг', $model->services->count()) }}</div>
                                                <button type="button"
                                                        class="project-counter-cta btn btn-outline-secondary anchor-button"
                                                        data-target="section-services">Смотреть какие...
                                                </button>
                                            </div>

                                            <div class="project-counter-description">было оказано в рамках этого
                                                проекта
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="project-description-container col-12 col-md align-self-center">
                                    {{$model->preview}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="section-project-article">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-10 offset-xxl-1">
                        <article class="article">

                            {!! $model->content_before_slider !!}


                            @if($model->images->count() > 0)
                                <div class="gallery-block">
                                    <div class="gallery-controls-container d-flex align-items-center justify-content-sm-end">
                                        <div class="swiper-gallery-pagination-wrapper swiper-pagination-wrapper">
                                            <div class="swiper-gallery-pagination swiper-pagination swiper-pagination-fraction">
                                                <span class="swiper-gallery-pagination-current swiper-pagination-current"></span>
                                                <span class="swiper-gallery-pagination-total swiper-pagination-total"></span>
                                            </div>
                                        </div>

                                        <div class="swiper-gallery-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                            <button type="button" class="swiper-gallery-button-prev swiper-button-prev swiper-button-sm d-flex align-items-center justify-content-center" >
                                                <svg class="swiper-button-prev-media" width="14" height="14">
                                                    <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-left')}}"></use>
                                                </svg>
                                            </button>

                                            <button type="button" class="swiper-gallery-button-next swiper-button-next swiper-button-sm d-flex align-items-center justify-content-center" >
                                                <svg class="swiper-button-next-media" width="14" height="14">
                                                    <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-right')}}"></use>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="swiper-gallery-cover swiper-cover">
                                        <div class="swiper-gallery swiper-container">
                                            <div class="swiper-wrapper">

                                                @foreach($model->images as $element)
                                                    <div class="swiper-slide">
                                                    <div class="gallery-header-container d-flex flex-column justify-content-center">
                                                        <div class="gallery-description">{{$element->name}}</div>
                                                    </div>

                                                    <div class="gallery-thumbnail">
                                                        <img src="{{$element->getImgPath('image', 'main', 'no-image-800x800.png')}}" width="1403" height="931" alt="{{$element->name}}" class="gallery-media">
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {!! $model->content_after_slider !!}

                        </article>
                    </div>
                </div>
            </div>
        </section>
    </section>

    @if($model->services->count() > 0)
        <section id="section-services" class="section-services section-purple-light section-filled">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-10 offset-xxl-1">
                        <div class="section-header">
                            <div class="row">
                                <div
                                    class="section-header-typography-container col d-flex flex-wrap align-items-center">
                                    <div class="section-title title-h1">Оказанные услуги</div>
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


                                    @foreach($model->services as $element)
                                        <div class="swiper-slide col-auto col-sm-6 col-md-4 col-xl-4 d-flex">
                                            @include('client.shared.services._card', ['model'=> $element, 'blackTaskIcon' => false])
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
    @endif

    @include('client.shared._section_social')

    @include('client.shared._section_projects', ['h1' => 'Другие проекты'])

@stop
