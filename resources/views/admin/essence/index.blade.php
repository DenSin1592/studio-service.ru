
@extends('admin.layouts.default')

@section('title') {{ $title }} @stop

@section('content')
    <div class="node-list element-list-wrapper" data-sortable-wrapper="">
        <div class="element-container header-container">
            <div class="sorting">Сортировка</div>
            <div class="name">{{ trans('validation.attributes.name') }}</div>
            <div class="publish-status">{{ trans('validation.attributes.publish') }}</div>
            <div class="control">{{ trans('interactions.controls') }}</div>
        </div>

        <div data-sortable-container="">

            @include($viewListName, ['lvl' => 0])

            @include('admin.shared._pagination_links', ['paginator' => $modelList])
        </div>

        @include('admin.shared.resource_list.sorting._commit', [
            'updateUrl' => route($routeUpdatePosition),
            'reloadUrl' => route($routeIndex)
            ])

        <div>
            <a href="{{ route($routeCreate) }}" class="btn btn-success btn-xs">Добавить</a>
        </div>
    </div>
@stop
