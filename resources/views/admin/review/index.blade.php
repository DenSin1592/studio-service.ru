@extends('admin.layouts.default')

@section('title', 'Отзывы')

@section('content')

    <div class="element-list-wrapper review-list">
        <div class="element-container header-container">
            <div class="id">{{ trans('validation.attributes.review_id') }}</div>
            <div class="name">{{ trans('validation.attributes.name') }}</div>
            <div class="content">{{ trans('validation.attributes.review_content') }}</div>
            <div class="review_date">{{ trans('validation.attributes.review_date') }}</div>
            <div class="publish">{{ trans('validation.attributes.publish') }}</div>
            <div class="publish">{{ trans('validation.attributes.on_home_page') }}</div>
            <div class="control">{{ trans('interactions.controls') }}</div>
        </div>

        <div>
            @include('admin.review._list', ['modelList' => $modelList])
            @include('admin.shared._pagination_links', ['paginator' => $modelList])
        </div>

        <div>
            <a href="{{ route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_CREATE) }}" class="btn btn-success btn-xs">Добавить отзыв</a>
        </div>
    </div>
@stop
