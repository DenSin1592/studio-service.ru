@extends('client.layouts.default')

@section('body_class')
    {{--todo:added class--}}
@stop

@section('content')

    <h1>{{$metaData['h1']}}</h1>

    @foreach($modelList as $model)
        <div>
            <a href="{{$model->url}}">{{$model->name}}</a>

            @foreach($model->children as $subModel )
                <div>
                    <img loading="lazy" src="{{{ $subModel->getImgPath('icon', 'icon', 'no-image-40x40.png') }}}"
                         alt="{{$subModel->name}}" class="card-category-media">
                    <a href="{{ $subModel->url}}">{{$subModel->name}}</a>
                </div>
            @endforeach
        </div>
    @endforeach
@stop
