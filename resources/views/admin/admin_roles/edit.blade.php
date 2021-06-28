@extends('admin.admin_roles.form')

@section('title')
    Редактирование роли администратора {{ $role->name }}
@stop

@section('submit_block')
    <button type="submit" class="btn btn-success">{{ trans('interactions.save') }}</button>
    <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.save_and_back_to_list') }}</button>
    <a href="{{ route(\App\Http\Controllers\Admin\AdminRolesController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
@stop
