@extends('admin.layouts.inner')

@section('title') {{ $formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY]->name }} - редактирование @stop

@section('content')

    @include('admin.layouts._breadcrumbs')

    {!! Form::tbModelWithErrors(
        $formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY],
        $errors,
        [
            'url' => route(\App\Http\Controllers\Admin\EssenceControllers\StructureController::ROUTE_UPDATE, [$formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY]->id]),
            'method' => 'put'
        ]) !!}

        @include('admin.structure._form_fields')

        {!! Form::hidden('position', $formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY]->position) !!}

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.save') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.save_and_back_to_list') }}</button>

            <a class="btn btn-danger"
               data-method="delete"
               data-confirm="Вы уверены, что хотите удалить данную страницу?"
               href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\StructureController::ROUTE_DESTROY, $formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY]->id) }}">{{ trans('interactions.delete') }}
            </a>

            <a href="{{ TypeContainer::getContentUrl($formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY]) }}" class="btn btn-default">{{ trans('interactions.edit') }}</a>
            <a href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\StructureController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
            @if ($formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY]->publish)
                @include('admin.shared._show_on_site_button', ['url' => TypeContainer::getClientUrl($formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY])])
            @endif
        </div>

    {!! Form::close() !!}
@stop

@if ($formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY]->publish)
    @section('go_to_site_link')
        @include('admin.shared._go_to_site_button', ['url' => TypeContainer::getClientUrl($formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY])])
    @stop
@endif
