@extends('client.layouts.default')

@section('content')

    <h1>{{$metaData['h1']}}</h1>

    {!! $page->content_top !!}

    @foreach($modelList as $model)

        <div>
            <img loading="lazy" src="{{{ $model->getImgPath('preview_image', 'small', 'no-image-200x200.png') }}}"
                 alt="{{$model->name}}" class="card-category-media">
            <a href="{{ $model->url}}">{{$model->name}}</a>
        </div>

        @if(count($model->tasks) > 0)
            <div>
                <div>какие задачи решает</div>
                @foreach($model->tasks as $elem)
                    <img loading="lazy" src="{{$elem->getImgPath('icon', 'icon', 'no-image-40x40.png')}}" alt=""
                         width="35" height="29" class="card-service-include-media">
                    <span>{{$elem->title}}}</span>
                @endforeach
            </div>
        @endif
    @endforeach

    @include('client.shared._section_social')
@stop
