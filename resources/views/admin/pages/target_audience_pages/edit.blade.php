@extends('admin.structure.inner')
{{-- Edit home pages --}}

@section('title')
    {{ $node->name }} - редактирование содержимого
@stop

@section('content')

    @include('admin.layouts._breadcrumbs', ['breadcrumbs' => $breadcrumbs])

    {!! Form::tbModelWithErrors($page, $errors, ['url' => route(\App\Http\Controllers\Admin\TargetAudiencePagesController::ROUTE_UPDATE, [$node->id]), 'method' => 'put', 'files' => true]) !!}

        @include('admin.shared._header_meta_field')

        @include('admin.shared._form_meta_fields')

        @include('admin.shared._model_timestamps', ['model' => $page])

        @include('admin.shared._pages._action_bar')

    {!! Form::close() !!}
@stop
