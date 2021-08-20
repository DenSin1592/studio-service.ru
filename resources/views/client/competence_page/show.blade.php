@extends('client.layouts.default')

@section('body_class')
    class="page-expertises d-flex flex-column"
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
                                <img src="{{asset('images/icons/general/svg/icon-expertise.svg')}}" alt="" width="104"
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

    <section class="section-expertises section-dark"
             style="background-image: url({{asset('images/sections/section-expertises/section-expertises-bg.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1">
                    <div class="expertises-grid row">

                        @foreach($modelList as $model)
                            <div class="expertise-item col-6 col-sm-4 col-md-3 d-flex">

                                @include('client.shared.competencies._card')

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.shared._section_social')
@stop
