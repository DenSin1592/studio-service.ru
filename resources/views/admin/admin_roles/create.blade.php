@extends('admin.admin_roles.form')

@section('title')
    Создание роли администратора
@stop

@section('submit_block')
    <button type="submit" class="btn btn-success">{{ trans('interactions.create') }}</button>
    <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.create_and_back_to_list') }}</button>
    <a href="{{ route('cc.admin-roles.index') }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
@stop
