@extends('client.layouts.default')

@section('body_class')
    class="page-home page-extended d-flex flex-column"
@stop

@section('content')

    @include('client.home_page._section_hero')

    @include('client.home_page._section_about')

    @if($targetAudiences->count() > 0)
        @include('client.home_page._section_target_audiences')
    @endif

    @if($services->count() > 0)
        @include('client.home_page._section_services')
    @endif

    @if($competencies->count() > 0)
        @include('client.home_page._section_competencies')
    @endif

    @if(!empty($page->block_advantages))
        @include('client.shared._section_advantages', ['block_advantages' => $page->block_advantages, 'elements' => $beforeAfterImages])
    @endif

    @include('client.shared._section_social')

    @if($reviews->count() > 0)
        @include('client.home_page._section_reviews')
    @endif

    @if($projects->count() > 0)
        @include('client.shared._section_projects', ['h1' => 'Проекты'])
    @endif

@stop

@section('modal')

    @include('client.shared.modals._modal_callback')
    @include('client.shared.modals._modal_message')

@stop
