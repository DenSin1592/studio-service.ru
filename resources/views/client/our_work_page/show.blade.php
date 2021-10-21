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
                                <img src="{{asset('images/icons/general/svg/icon-services.svg')}}" alt="" width="104"
                                     height="104" class="display-media">
                            </div>
                        </div>

                        <div class="display-typography-container col-12 col-sm-10 col-xl-11">
                            <div class="display-description">{!! $page->content_top !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-projects m-0">

        @foreach($modelList as $element)

            <div class="card-project ">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-10 offset-xxl-1">
                            <div class="row">
                                <div class="card-project-media-container col-12 col-md-6 order-md-1">
                                    <div class="card-project-thumnbnail">
                                        <img
                                            src="{{{ $element->getImgPath('preview_image', 'main', 'no-image-800x800.png') }}}"
                                            alt="{{$element->name}}s"
                                            class="card-project-media">
                                    </div>
                                </div>

                                <div
                                    class="card-project-typography-container col-12 col-md-6 order-md-0">
                                    <a href="{{$element->url}}"
                                       class="card-project-title title-h3">{{$element->name}}</a>

                                    <div class="card-project-description">{{$element->preview}}</div>

                                    @if($element->services->count() > 0)
                                        <div class="card-project-services-block">
                                            <div class="card-project-services-title">Оказанные услуги</div>

                                            <ul class="card-project-services-list list-unstyled check-list">

                                                @foreach($element->services as $elem)
                                                    <li class="list-item">
                                                        <a href="{{ $elem->url}}"
                                                           class="list-link">{{$elem->name}}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    @endif

                                    <a href="{{ $element->url}}"
                                       class="card-project-cta btn btn-outline-secondary">Более подробно
                                        о проекте</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        
    </section>

    @include('client.shared._section_social')
@stop
