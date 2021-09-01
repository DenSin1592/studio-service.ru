@extends('admin.layouts.inner')
{{-- Edit home pages --}}

@section('title')
    {{ $node->name }} - редактирование содержимого
@stop

@section('content')

    @include('admin.layouts._breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    {!! Form::tbModelWithErrors($page, $errors, ['url' => route($route_update, [$node->id]), 'method' => 'put', 'files' => true]) !!}

    @include('admin.shared._form_meta_fields')

    {!! Form::tbTextareaBlock('description_after_header', trans('validation.attributes.description_after_header')) !!}

    {!! Form::tbTextBlock('youtube_link_about', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://www.youtube.com/watch?v=-452p_9ESbM&t=247s)']) !!}

    {!! Form::tbTextBlock('link_about') !!}

    {!! Form::tbTextareaBlock('short_about', trans('validation.attributes.short_about')) !!}

    {!! Form::tbTinymceTextareaBlock('block_advantages', trans('validation.attributes.block_advantages'), null, ['hint' => 'Изображения "До/После" находятся в разделе справочники']) !!}

    @include('admin.shared._model_timestamps', ['model' => $page])

    @include('admin.shared._pages._action_bar')

    {!! Form::close() !!}
@stop
