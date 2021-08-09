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
                            <div class="display-description">{!! $page->content_top !!}</div>
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

                        @foreach($modelList as $model)
                            <div class="service-item col-12 col-sm-6 col-md-4 d-flex">

                                @include('client.shared.services._card', ['blackTaskIcon' => true])

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.shared._section_social')
@stop
