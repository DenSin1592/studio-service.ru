@extends('admin.layouts.default')

@section('title', 'Страница не найдена')

@section('content')
    Запрашиваемая вами страница не существует или была удалена.<br/>
    Вы можете вернуться на {{ link_to_route('cc.home', 'главную страницу') }}.
@stop
