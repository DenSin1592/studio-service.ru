@extends('admin.layouts.inner')

@section('title')
    {{ $formData['service']->name }} - редактирование компетенции
@stop

@section('content')

    @include('admin.layouts._breadcrumbs')

    {!! Form::tbModelWithErrors($formData['service'], $errors, ['url' => route(\App\Http\Controllers\Admin\ServicesController::ROUTE_UPDATE, [$formData['service']->id]), 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}

        @include('admin.services._form_fields')

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.save') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.save_and_back_to_list') }}</button>

            <a class="btn btn-danger"
               data-method="delete"
               data-confirm="Вы уверены, что хотите удалить данную услугу?"
               href="{{ route(\App\Http\Controllers\Admin\ServicesController::ROUTE_DESTROY, [$formData['service']->id]) }}">{{ trans('interactions.delete') }}
            </a>

            <a href="{{ route(\App\Http\Controllers\Admin\ServicesController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
        </div>

    {!! Form::close() !!}
@stop
