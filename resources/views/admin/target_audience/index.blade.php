@extends('admin.layouts.default')

@section('title')
    {{ 'Каталог Целевых Аудиторий' }}
@stop

@section('content')
    <div class="node-list element-list-wrapper" data-sortable-wrapper="">
        <div class="element-container header-container">
            <div class="sorting">Сортировка</div>
            <div class="name">{{ trans('validation.attributes.name') }}</div>
            <div class="publish-status">{{ trans('validation.attributes.publish') }}</div>
            <div class="control">{{ trans('interactions.controls') }}</div>
        </div>

        <div data-sortable-container="">
            @include('admin.target_audience._list', ['modelTree' => $modelTree, 'lvl' => 0])
        </div>

        @include('admin.shared.resource_list.sorting._commit', ['updateUrl' => route(\App\Http\Controllers\Admin\TargetAudiencesController::ROUTE_UPDATE_POSITIONS), 'reloadUrl' => route(\App\Http\Controllers\Admin\TargetAudiencesController::ROUTE_INDEX)])

        <div>
            <a href="{{ route(\App\Http\Controllers\Admin\TargetAudiencesController::ROUTE_CREATE) }}" class="btn btn-success btn-xs">Добавить ЦА</a>
        </div>
    </div>
@stop
