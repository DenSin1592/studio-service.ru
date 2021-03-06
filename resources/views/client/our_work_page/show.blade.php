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
                </div>
            </div>
        </div>
    </section>


    <section class="section-projects section-purple-dark m-0">
        <div class="projects-grid row">

            @foreach($modelList as $element)
                <div class="project-item col-12">
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
                                                    <div class="card-project-services-title">?????????????????? ????????????</div>
        
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
                                               class="card-project-cta btn btn-outline-secondary">?????????? ????????????????
                                                ?? ??????????????</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    @include('client.shared._section_social')
@stop
