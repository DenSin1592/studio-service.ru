@extends('client.layouts.default')

@section('body_class')
    class="page-service page-extended d-flex flex-column"
@stop

@section('content')

    @include('client.catalog_essence.service._section_header')

    @if($model->section_target_audiences_publish && $model->targetAudiences->count() > 0)
        @include('client.shared._section_target_audiences',
            [
                'header' => $model->section_target_audiences_name,
                'elements' => $model->targetAudiences,

            ])
    @endif

    @foreach($model->contentBlocks as $element)
        @if($element->image_right)
            @include('client.catalog_essence.service._content_block_image_right')
        @else
            @include('client.catalog_essence.service._content_block_image_left')
        @endif
    @endforeach

    @if($model->section_tasks_publish || $model->section_video_publish)
        <section class="section-unite section-dark overflow-hidden">

            @if($model->section_tasks_publish && $model->tasks->count() > 0)
                @include('client.catalog_essence.service._section_tasks')
            @endif
            @if($model->section_video_publish)
                @include('client.catalog_essence.service._section_video')
            @endif
        </section>
    @endif

    @if($model->section_tabs_publish)
        @include('client.catalog_essence.service._section_includes')
    @endif

    @if($model->section_requirements_publish)
        @include('client.catalog_essence.service._section_requirements')
    @endif

    @include('client.shared._section_social')

    @if($model->section_faq_publish)
        @include('client.catalog_essence.service._section_faq')
    @endif

    @if($model->section_prices_publish)
        @include('client.catalog_essence.service._section_prices')
    @endif

    @if($model->section_advantages_publish)
        @include('client.shared._section_advantages',
            [
                'block_advantages' => $model->section_advantages_content,
                'elements' => $model->beforeAfterImages
            ])
    @endif

    @include('client.catalog_essence.service._section_feedback')


    @if($model->section_competencies_publish && $model->competencies->count())
        @include('client.shared._section_competencies',
            [
                'header' => $model->section_competencies_name,
                'visibleSeeAllLink' => false,
                'elements' => $model->competencies,

            ])
    @endif

    @if($model->section_services_publish && $otherService = $model->otherServices())
        @include('client.shared._section_services',
            [
                'header' => $model->section_services_name,
                'visibleSeeAllLink' => false,
                'elements' => $otherService,

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



