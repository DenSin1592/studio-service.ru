@extends('client.layouts.default')

@section('body_class')
    {{--todo:added class--}}
@stop

@section('content')

    <h1>{!! $metaData['h1'] !!}</h1>

    <div>{{$model->preview}}</div>
    <hr>
    <div>{!!$model->description!!}</div>

@stop
