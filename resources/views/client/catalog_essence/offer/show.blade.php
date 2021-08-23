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

    @if($model->section_prices_publish)
        @include('client.catalog_essence.offer._section_prices')
    @endif

    @if($model->section_advantages_publish)
        @include('client.shared._section_advantages',
            [
                'block_advantages' => $model->section_advantages_content,
                'elements' => $model->beforeAfterImages
            ])
    @endif

    @include('client.catalog_essence.offer._section_feedback')

    @if($model->section_competencies_publish && $model->service->competencies->count())
        @include('client.shared._section_competencies',
            [
                'header' => $model->section_competencies_name,
                'visibleSeeAllLink' => false,
                'elements' => $model->service->competencies,

            ])
    @endif

    @if($model->section_offers_publish && $model->otherOffers()->count() > 0)
        @include('client.catalog_essence.offer._section_offers',
            [
                'header' => $model->section_offers_name,
                'visibleSeeAllLink' => false,
                'elements' => $model->otherOffers(),

            ])
    @endif

    @if($model->section_reviews_publish && $model->reviews->count() > 0)
        @include('client.shared._section_reviews',
        [
            'header' => 'Отзывы',
            'elements' => $model->reviews
        ])
    @endif

    @if($model->section_projects_publish && $model->ourWorks->count() > 0)
        @include('client.shared._section_projects',
        [
            'header' => 'Проекты',
            'elements' => $model->ourWorks
        ])
    @endif

@stop

@section('modal')

    @include('client.shared.modals._modal_message')

@stop
