@extends('admin.layouts.inner')

@section('title', 'Создание страницы')

@section('content')

    @include('admin.layouts._breadcrumbs')

    {!! Form::tbModelWithErrors(
        $formData[\App\Services\DataProviders\NodeForm\NodeForm::MODEL_KEY],
        $errors,
        [
            'url' => route('cc.structure.store'),
            'method' => 'post'
            ]) !!}

        @include('admin.structure._form_fields')

        <div class="action-bar">
            <button type="submit" class="btn btn-success">{{ trans('interactions.create') }}</button>
            <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.create_and_back_to_list') }}</button>
            <a href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\StructureController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
        </div>

    {!! Form::close() !!}
@stop
