@extends('client.layouts.default')


@section('content')

    <h1>{{$metaData['h1']}}</h1>

    {!! $page->content_top !!}

    @foreach($modelList as $model)

        <div>
            <a href="{{$model->url}}">
            <img loading="lazy" src="{{{ $model->getImgPath('preview_image', 'main', 'no-image-500x500.png') }}}"
                 alt="{{$model->name}}" class="card-category-media">
        <div>{{$model->name}}</div>
            </a>
        </div>

        @include('client.shared._section_social')

    @endforeach

@stop
