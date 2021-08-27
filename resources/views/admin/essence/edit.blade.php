@extends('admin.layouts.inner')

@section('title') {{ $formData[$essenceName]->name ?? ($formData[$essenceName]->phone ?? '')}} - редактирование @stop

@section('content')

    @include('admin.layouts._breadcrumbs')

    {!! Form::tbModelWithErrors(
        $formData[$essenceName],
        $errors,
        [
            'url' => route($routeUpdate, [$formData[$essenceName]->id]),
            'method' => 'put',
            'files' => true,
            'autocomplete' => 'off'
            ]) !!}

        {!! Form::hidden('admin', true) !!}
    
        @include($viewFormFieldsName)

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.save') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.save_and_back_to_list') }}</button>

            <a class="btn btn-danger"
               data-method="delete"
               data-confirm="Вы уверены, что хотите удалить данную компетенцию?"
               href="{{ route($routeDestroy, [$formData[$essenceName]->id]) }}">{{ trans('interactions.delete') }}
            </a>

            <a href="{{ route($routeIndex) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>

            @if ($formData[$essenceName]->publish && !empty($urlShowOnSite))
                @include('admin.shared._show_on_site_button', ['url' => route($urlShowOnSite, $formData[$essenceName]->alias)])
            @endif
        </div>

    {!! Form::close() !!}
@stop
