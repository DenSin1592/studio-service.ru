@extends('admin.layouts.inner')

@section('title')
    {{ $node->name }} - редактирование содержимого
@stop

@section('content')

    @include('admin.layouts._breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    {!! Form::tbModelWithErrors($page, $errors, ['url' => route($route_update, [$node->id]), 'method' => 'put', 'files' => true]) !!}

    @include('admin.shared._form_header')

        {!! Form::tbTinymceTextareaBlock('content', trans('validation.attributes.content')) !!}

        @include('admin.shared._form_meta_fields')

        @include('admin.shared._model_timestamps', ['model' => $page])

        @include('admin.shared._pages._action_bar')

    {!! Form::close() !!}
@stop
