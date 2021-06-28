@extends('admin.layouts.default')

@section('title')
    Роли
@stop

@section('content')
    <div class="element-list-wrapper role-list">
        <div class="element-container header-container">
            <div class="name">{{ trans('validation.attributes.name') }}</div>
            <div class="creator">{{ trans('validation.attributes.creator') }}</div>
            <div class="control">{{ trans('interactions.controls') }}</div>
        </div>

        <ul class="element-list scrollable-container">
            @foreach ($role_list as $role)
                <li>
                    <div class="element-container">
                        <div class="name">
                            <a href="{{ route(\App\Http\Controllers\Admin\AdminRolesController::ROUTE_EDIT, [$role->id]) }}">
                                {{ $role->name }}
                            </a>
                        </div>
                        <div class="creator">
                            @if ($role->parent)
                                @can('change-admin-user', $role->parent)
                                    <a href="{{ route(\App\Http\Controllers\Admin\AdminUsersController::ROUTE_EDIT, [$role->parent->id]) }}">
                                        {{ $role->parent->username }}
                                    </a>
                                @else
                                    {{ $role->parent->username }}
                                @endcan
                            @endif
                        </div>
                        <div class="control">
                            @include('admin.admin_roles._list_controls')
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div>
            <a href="{{ route(\App\Http\Controllers\Admin\AdminRolesController::ROUTE_CREATE) }}" class="btn btn-success btn-xs">Добавить роль</a>
        </div>
    </div>
@stop
