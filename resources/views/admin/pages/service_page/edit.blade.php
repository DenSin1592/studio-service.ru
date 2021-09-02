@extends('admin.layouts.inner')

@section('title')
    {{ $node->name }} - редактирование содержимого
@stop

@section('content')

    @include('admin.layouts._breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    {!! Form::tbModelWithErrors($page, $errors, ['url' => route($route_update, [$node->id]), 'method' => 'put', 'files' => true]) !!}

        @include('admin.shared._form_header')

        {!! Form::tbTextareaBlock('content_top', trans('validation.attributes.content_top')) !!}

        @include('admin.shared._form_meta_fields')

        @include('admin.shared._model_timestamps', ['model' => $page])

        @include('admin.shared._pages._action_bar')

    {!! Form::close() !!}
@stop
