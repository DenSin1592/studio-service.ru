@extends('client.layouts.default')

@section('body_class')
    class="page-services d-flex flex-column"
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
                    <div class="display-media-container col-3 col-sm-2 col-xl-1">
                        <div class="display-thumnbail">
                            <img src="{{asset('images/icons/general/png/icon-services.png')}}" alt="" width="104"
                                 height="104" class="display-media">
                        </div>
                    </div>

                    <div class="display-typography-container col-12 col-sm-10 col-xl-11">
                        <div class="display-description">{!! $model->content_top !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    <section class="section-services section-purple-light section-filled">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    <div class="services-grid row">

                        @foreach($model->offers as $model)
                            <div class="service-item col-12 col-sm-6 col-md-4 d-flex">

                                <a href="{{$model->url}}" class="card-service d-flex flex-column">
                                    <div class="card-service-thumbnail">
                                        <img loading="lazy"
                                             src="{{{ $model->getImgPath('preview_image', 'main', 'no-image-200x200.png') }}}"
                                             alt="{{$model->name}}"
                                             class="card-service-media">
                                    </div>

                                    <div class="card-service-title flex-grow-1">
                                        {{$model->name}}
                                    </div>

                                    @if(count($model->service->tasks) > 0)
                                        <div class="card-service-include-block">
                                            <div class="card-service-include-title">Какие задачи решает:</div>

                                            <ul class="card-service-include-list card-service-include-pills-list list-unstyled d-flex flex-wrap align-items-center">
                                                @foreach($model->service->tasks as $elem)
                                                    <li class="card-service-include-item d-flex align-items-center justify-content-center"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="{{$elem->title}}">
                                                        <img loading="lazy"
                                                             src="{{$elem->getImgPath('icon', 'main', 'no-image-40x40.png')}}" alt=""
                                                             width="35" height="29" class="card-service-include-media">
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="card-service-cta d-flex align-items-center justify-content-center">
                                        <svg class="card-service-cta-media" width="19" height="19">
                                            <use xlink:href="{{asset('images/icons/sprite.svg#icon-arrow-right')}}"></use>
                                        </svg>
                                    </div>
                                </a>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.shared._section_social')

@stop
