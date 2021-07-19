@extends('admin.layouts.inner')

@section('title')
    {{ $formData['review']->name }} - редактирование
@stop

@section('content')

    @include('admin.layouts._breadcrumbs')

    {!! Form::tbModelWithErrors($formData['review'], $errors, ['url' => route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_UPDATE, [$formData['review']->id]), 'method' => 'put', 'files' => true, 'autocomplete' => 'off']) !!}

        @include('admin.review._form_fields')

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.save') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.save_and_back_to_list') }}</button>

            <a class="btn btn-danger"
               data-method="delete"
               data-confirm="Вы уверены, что хотите удалить данную запись?"
               href="{{ route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_DESTROY, [$formData['review']->id]) }}">{{ trans('interactions.delete') }}
            </a>

            <a href="{{ route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
        </div>


    {!! Form::close() !!}
@stop
