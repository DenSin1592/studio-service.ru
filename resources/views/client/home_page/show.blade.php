@extends('client.layouts.default')

@section('body_class')
    class="page-home page-extended d-flex flex-column"
@stop

@section('content')

    @include('client.home_page._section_hero')

    @include('client.home_page._section_about')

    @include('client.home_page._section_target_audiences')

    @include('client.home_page._section_services')

    @include('client.home_page._section_competencies')

    @include('client.home_page._section_advantages')

    @include('client.shared._section_social')

    @include('client.home_page._section_reviews')

    @include('client.shared._section_projects', ['h1' => 'Проекты'])
@stop

@section('modal')

    @include('client.shared.modals._modal_callback')
    @include('client.shared.modals._modal_message')

@stop
