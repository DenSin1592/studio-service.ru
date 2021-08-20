@extends('admin.layouts.guest')
{{-- 403 for admin system --}}

@section('title')
    Доступ запрещён!
@stop

@section('body_class')
    class="d-flex flex-column"
@stop

@section('content')
    <p>Вы не имеете необходимых прав для данного действия!</p>
    <p><a href="{{{ route('cc.logout') }}}" data-method="delete">Выход</a></p>
    <p><a href="{{{ route('cc.home') }}}" data-method="get">На главную</a></p>
@stop
