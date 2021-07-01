@extends('admin.layouts.inner')

@section('title')
    {{ $model->name }} - редактирование компетенции
@stop

@section('content')

    {!! Form::tbModelWithErrors($model, $errors, ['url' => route(\App\Http\Controllers\Admin\ServicesController::ROUTE_UPDATE, [$model->id]), 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}

        @include('admin.services._form_fields')

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.save') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.save_and_back_to_list') }}</button>
            @include('admin.services._delete')
            <a href="{{ route(\App\Http\Controllers\Admin\ServicesController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
        </div>

    {!! Form::close() !!}
@stop
