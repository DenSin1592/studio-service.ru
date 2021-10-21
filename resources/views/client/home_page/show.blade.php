@extends('client.layouts.default')

@section('body_class')
    class="page-home page-extended d-flex flex-column"
@stop

@section('content')

    @include('client.home_page._section_hero')

    @if($targetAudiences->count() > 0)
        @include('client.shared._section_target_audiences',
           [
               'header' => 'Для кого работаем',
               'elements' => $targetAudiences,
           ])
    @endif

    @if($services->count() > 0)
        @include('client.shared._section_services',
            [
                'header' => 'Услуги',
                'visibleSeeAllLink' => true,
                'elements' => $services,

            ])
    @endif

    @if($competencies->count() > 0)
        @include('client.shared._section_competencies',
            [
                'header' => 'Наши компетенции',
                'visibleSeeAllLink' => true,
                'elements' => $competencies,

            ])
    @endif

    @if(!empty($page->block_advantages))
        @include('client.shared._section_advantages', ['block_advantages' => $page->block_advantages, 'elements' => $beforeAfterImages])
    @endif

    @include('client.shared._section_social')

    @if($reviews->count() > 0)
        @include('client.shared._section_reviews',
        [
            'header' => 'Отзывы',
            'elements' => $reviews
        ])
    @endif

    @if($projects->count() > 0)
        @include('client.shared._section_projects',
        [
            'header' => 'Проекты',
            'elements' => $projects,
        ])
    @endif

@stop

@section('modal')

    @include('client.shared.modals._modal_callback')

@stop
