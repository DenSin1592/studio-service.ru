@extends('client.layouts.default')

@section('body_class')
    class="page-expertise d-flex flex-column"
@stop

@section('content')

    <section class="section-display">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">

                    @include('client.shared.breadcrumbs._breadcrumbs')


                    <div class="display-header">
                        <h1 class="display-title title-h1">{!! $metaData['h1'] !!}</h1>
                    </div>

                    <div class="row">
                        <div class="display-typography-container col-12">
                            <div class="display-description">{{$model->description}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach($model->contentBlocks as $contentBlock)
        {!! $contentBlock->content !!}
    @endforeach

    @if($model->services->count() > 0)
    <section class="section-services">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    <div class="section-header">
                        <div class="row">
                            <div class="section-header-typography-container col d-flex flex-wrap align-items-center">
                                <div class="section-title title-h1">В каких услугах используется телестудия?</div>
                            </div>

                            <div class="section-header-controls-container col-auto d-md-none align-self-end">
                                <div class="swiper-services-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                    <button type="button" class="swiper-services-button-prev swiper-button-prev d-flex align-items-center justify-content-center" >
                                        <svg class="swiper-button-prev-media" width="14" height="14">
                                            <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-left')}}"></use>
                                        </svg>
                                    </button>

                                    <button type="button" class="swiper-services-button-next swiper-button-next d-flex align-items-center justify-content-center" >
                                        <svg class="swiper-button-next-media" width="14" height="14">
                                            <use xlink:href="{{asset('/images/icons/sprite.svg#icon-angle-right')}}"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-services-cover swiper-cover">
                        <div class="swiper-services swiper-container">
                            <div class="swiper-wrapper row flex-nowrap">

                                @foreach($model->services as $element)
                                <div class="swiper-slide col-auto col-sm-6 col-md-4 col-xl-4 d-flex">
                                    @include('client.shared.services._card', ['model'=> $element, 'blackTaskIcon' => false, 'seeTaskDescriptionTooltip' => false, 'relations' => 'tasks'])
                                </div>
                                @endforeach

                            </div>

                            <button type="button" class="swiper-services-button-prev swiper-button-prev d-none d-md-block" >
                                <svg class="swiper-button-prev-media" width="19" height="19">
                                    <use xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                                </svg>
                            </button>

                            <button type="button" class="swiper-services-button-next swiper-button-next d-none d-md-block" >
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
    @endif

    @include('client.shared._section_social')

@stop
