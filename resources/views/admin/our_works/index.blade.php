@extends('admin.layouts.default')

@section('title') {{'Наши работы' }} @stop

@section('content')
    <div class="node-list element-list-wrapper" data-sortable-wrapper="">
        <div class="element-container header-container">
            <div class="sorting">Сортировка</div>
            <div class="name">{{ trans('validation.attributes.name') }}</div>
            <div class="publish-status">{{ trans('validation.attributes.publish') }}</div>
            <div class="control">{{ trans('interactions.controls') }}</div>
        </div>

        <div data-sortable-container="">
            @include('admin.our_works._list', ['lvl' => 0])
            @include('admin.shared._pagination_links', ['paginator' => $modelList])
        </div>

        @include('admin.shared.resource_list.sorting._commit', [
            'updateUrl' => route(\App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_UPDATE_POSITIONS),
            'reloadUrl' => route(\App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_INDEX),
            ])

        <div>
            <a href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_CREATE) }}" class="btn btn-success btn-xs">Добавить отзыв</a>
        </div>
    </div>
@stop
