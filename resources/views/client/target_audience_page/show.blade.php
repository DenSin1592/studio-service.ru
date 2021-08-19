@extends('client.layouts.default')

@section('body_class')
    class="page-target page-extended d-flex flex-column"
@stop

@section('content')

    <section class="section-target section-dark"
             style="background-image: url({{asset('images/sections/section-expertises/section-expertises-bg.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">

                    @include('client.shared.breadcrumbs._breadcrumbs')

                    <div class="section-header">
                        <div class="form-row align-items-center">
                            <div
                                class="section-header-typography-container col-auto d-flex flex-wrap align-items-center">
                                <h1 class="section-title title-h1">{!! $metaData['h1'] !!}</h1>
                            </div>

                            <div class="section-header-controls-container col-auto">
                                <div
                                    class="swiper-target-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                    <button type="button"
                                            class="swiper-target-button-prev swiper-button-prev swiper-button-light">
                                        <svg class="swiper-button-prev-media" width="14" height="14">
                                            <use
                                                xlink:href="{{asset('images/icons/sprite.svg#icon-angle-left')}}"></use>
                                        </svg>
                                    </button>

                                    <button type="button"
                                            class="swiper-target-button-next swiper-button-next swiper-button-light">
                                        <svg class="swiper-button-next-media" width="14" height="14">
                                            <use
                                                xlink:href="{{asset('images/icons/sprite.svg#icon-angle-right')}}"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="section-header-switch-container col-auto">
                                <button type="button" class="section-header-cta btn btn-primary" data-toggle="modal"
                                        data-target="#modalTarget">
                                        <svg class="btn-icon" width="22" height="22" >
                                            <use xlink:href="{{asset('images/icons/sprite.svg#icon-bars')}}"></use>
                                        </svg>
                                        <span class="d-none d-sm-inline">Смотреть списком</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-target-cover swiper-cover">
                        <div class="swiper-target swiper-container">
                            <div class="swiper-wrapper d-flex flex-nowrap">

                                @foreach($modelList as $model)
                                    <div class="swiper-slide col-10 col-sm-6 col-md-4 d-flex">
                                        <div class="card-target d-flex flex-column"
                                             style="background-image: url({{$model->getImgPath('background_image', 'main', 'no-image-200x200.png') }})">
                                            <div class="card-target-header">
                                                <div class="card-target-count">{{$loop->iteration}}.</div>
                                                <div class="card-target-title title-h3">{{$model->name}}
                                                </div>
                                            </div>

                                            <ul class="card-target-includes list-unstyled">

                                                @foreach($model->children as $subModel )
                                                    <li class="card-target-include-item">
                                                        <a href="{{$subModel->url}}"
                                                           class="card-category card-category-sm text-left">
                                                            <div
                                                                class="form-row align-items-center justify-content-center justify-content-xxl-start flex-nowrap">
                                                                <div class="card-category-media-container col-auto">
                                                                    <div class="card-category-thumbnail">
                                                                        <img loading="lazy"
                                                                             src="{{$subModel->getImgPath('icon', null, 'no-image-40x40.png') }}"
                                                                             width="49" height="42"
                                                                             alt="{{$subModel->name}}"
                                                                             class="card-category-media">
                                                                    </div>
                                                                </div>

                                                                <div class="card-category-typography-container col">
                                                                    <div
                                                                        class="card-category-title">{{$subModel->name}}</div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach

                                            </ul>
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
@stop

@section('modal')

    <div class="modal fade" id="modalTarget" tabindex="-1" aria-labelledby="modalTargetLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="modal-header d-flex align-items-center">
                                <div class="modal-title title-h1" id="modalTargetLabel">Список ЦА</div>

                                <button type="button"
                                        class="modal-close d-flex align-items-center justify-content-center"
                                        data-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" class="modal-close-media" width="40" height="40">
                                        <use xlink:href="{{asset('images/icons/sprite.svg#icon-close')}}"></use>
                                    </svg>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="target-grid row">

                                    @foreach($modelList as $model)
                                        <div class="target-item col-12 col-sm-6 col-md-4 col-xl-3">
                                            <div class="card-target card-target-sm">
                                                <div class="card-target-header">
                                                    <div class="card-target-count">{{$loop->iteration}}.</div>
                                                    <div class="card-target-title title-h6">{{$model->name}}
                                                    </div>
                                                </div>

                                                <ul class="card-target-includes list-unstyled">

                                                    @foreach($model->children as $subModel )
                                                        <li class="card-target-include-item">
                                                            <a href="{{$subModel->url}}"
                                                               class="card-category card-category-xs text-left">
                                                                <div
                                                                    class="form-row align-items-center justify-content-center justify-content-xxl-start flex-nowrap">
                                                                    <div class="card-category-media-container col-auto">
                                                                        <div class="card-category-thumbnail">
                                                                            <img loading="lazy"
                                                                                 src="{{$subModel->getImgPath('icon', null, 'no-image-40x40.png') }}"
                                                                                 width="49" height="42"
                                                                                 alt="{{$subModel->name}}"
                                                                                 class="card-category-media">
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-category-typography-container col">
                                                                        <div
                                                                            class="card-category-title">{{$subModel->name}}</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
