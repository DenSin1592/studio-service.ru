@extends('admin.layouts.inner')

@section('title', 'Создание')

@section('content')

    @include('admin.layouts._breadcrumbs')

    {!! Form::tbModelWithErrors(
        $formData[$essenceName],
        $errors,
        [
            'url' => route($routeStore),
            'method' => 'post',
            'files' => true,
            'autocomplete' => 'off'
            ]) !!}

        @include($viewFormFieldsName)

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.create') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.create_and_back_to_list') }}</button>
            <a href="{{ route($routeIndex) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
        </div>

    {!! Form::close() !!}
@stop
