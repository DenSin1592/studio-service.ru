@extends('admin.layouts.inner')

@section('title', 'Создание ЦА')

@section('content')

    @include('admin.layouts._breadcrumbs')

    {!! Form::tbModelWithErrors($model, $errors, ['url' => route(\App\Http\Controllers\Admin\TargetAudiencesController::ROUTE_STORE), 'method' => 'post', 'files' => true, 'autocomplete' => 'off']) !!}

        @include('admin.target_audience._form_fields')

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.create') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.create_and_back_to_list') }}</button>
            <a href="{{ route(\App\Http\Controllers\Admin\TargetAudiencesController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
        </div>

    {!! Form::close() !!}
@stop
