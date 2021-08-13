@extends('client.layouts.default')

@section('body_class')
    class="page-service page-extended d-flex flex-column"
@stop

@section('content')
{{--

@include('client.shared.breadcrumbs._breadcrumbs')

    {!! $metaData['h1'] !!}

    {{$model->getImgPath('header_block_background_image', 'main')}}

    {!! $model->achievements_block !!}

    {{$model->getImgPath('image_right_from_header', 'main')}}


    @foreach($model->contentBlocks as $element)
        @if($element->image_right)
            @include('client.catalog_essence.service._content_block_image_right')
        @else
            @include('client.catalog_essence.service._content_block_image_left')
        @endif
    @endforeach

--}}

<section class="section-service section-dark" style="background-image: url('{{$model->getImgPath('header_block_background_image', 'main')}}')" >
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="row">
                    <div class="service-typography-container col-12 col-md-7 col-xxl-8">

                        @include('client.shared.breadcrumbs._breadcrumbs')

                        <div class="row">
                            <div class="col-10 col-sm-8 col-md-12">
                                <div class="service-title title-h1">{!! $metaData['h1'] !!}</div>
                            </div>
                        </div>

                        {!! $model->achievements_block !!}

                        <div class="service-actions-block">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <button type="button" class="service-cta-btn btn btn-lg btn-primary anchor-button" data-target="section-feedback">
                                        <svg class="btn-icon" width="31" height="22">
                                            <use xlink:href="images/icons/sprite.svg#icon-arrow-to-right"></use>
                                        </svg>
                                        Отправить заявку
                                    </button>
                                </div>

                                <div class="col-auto">
                                    <ul class="service-social-list social-list list-unstyled d-flex flex-wrap">
                                        <li class="social-item">
                                            <a href="#link" class="social-link d-flex align-items-center justify-content-center">
                                                <svg class="social-media" width="22" height="22">
                                                    <use xlink:href="images/icons/sprite.svg#icon-telegram"></use>
                                                </svg>
                                            </a>
                                        </li>

                                        <li class="social-item">
                                            <a href="#link" class="social-link d-flex align-items-center justify-content-center">
                                                <svg class="social-media" width="31" height="31">
                                                    <use xlink:href="images/icons/sprite.svg#icon-whatsapp"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="service-media-container col-12 col-md-5 col-xl-5 col-xxl-5 offset-8 offset-sm-5 offset-md-7 offset-xxl-8 d-flex align-items-start justify-content-center">
                        <figure class="service-media-figure" >
                            <img loading="lazy" src="{{$model->getImgPath('image_right_from_header', 'main')}}" width="664" height="558" alt="" class="service-media">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @foreach($model->contentBlocks as $element)
        @if($element->image_right)
            @include('client.catalog_essence.service._content_block_image_right')
        @else
            @include('client.catalog_essence.service._content_block_image_left')
        @endif
    @endforeach
@stop


{{--@section('modal')

    @include('client.shared.modals._modal_callback')
    @include('client.shared.modals._modal_message')

@stop--}}
