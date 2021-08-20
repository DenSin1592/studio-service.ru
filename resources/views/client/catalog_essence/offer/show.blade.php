@extends('client.layouts.default')

@section('body_class')
    class="page-service page-extended d-flex flex-column"
@stop

@section('content')

    @include('client.catalog_essence.offer._section_header')

    @foreach($model->contentBlocks as $element)
        @if($element->image_right)
            @include('client.catalog_essence.offer._content_block_image_right')
        @else
            @include('client.catalog_essence.offer._content_block_image_left')
        @endif
    @endforeach

    @if($model->section_tasks_publish || $model->section_video_publish)
        <section class="section-unite section-dark overflow-hidden">

            @if($model->section_tasks_publish && $model->service->tasks->count() > 0)
                @include('client.catalog_essence.offer._section_tasks')
            @endif
            @if($model->section_video_publish)
                @include('client.catalog_essence.offer._section_video')
            @endif
        </section>
    @endif

    @if($model->section_tabs_publish)
        @include('client.catalog_essence.offer._section_includes')
    @endif

    @if($model->section_requirements_publish)
        @include('client.catalog_essence.offer._section_requirements')
    @endif

    @if($model->section_faq_publish)
        @include('client.catalog_essence.offer._section_faq')
    @endif

@stop
