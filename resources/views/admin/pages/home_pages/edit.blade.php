@extends('admin.layouts.inner')
{{-- Edit home pages --}}

@section('title')
    {{ $node->name }} - редактирование содержимого
@stop

@section('content')

    @include('admin.layouts._breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    {!! Form::tbModelWithErrors($page, $errors, ['url' => route($route_update, [$node->id]), 'method' => 'put', 'files' => true]) !!}

    @include('admin.shared._form_meta_fields')

    {!! Form::tbTinymceTextareaBlock('description_after_header', trans('validation.attributes.description_after_header')) !!}

    {!! Form::tbTextBlock('youtube_link_about', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://youtu.be/K73-hmaHPHY)']) !!}


    {!! Form::tbTextBlock('link_about') !!}

    {!! Form::tbTinymceTextareaBlock('short_about', trans('validation.attributes.short_about')) !!}

    {!! Form::tbTinymceTextareaBlock('block_advantages', trans('validation.attributes.block_advantages')) !!}

    @include('admin.shared._model_timestamps', ['model' => $page])

    @include('admin.shared._pages._action_bar')

    {!! Form::close() !!}
@stop
