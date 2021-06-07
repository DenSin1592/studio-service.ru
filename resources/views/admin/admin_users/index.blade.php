@extends('admin.layouts.default')

@section('title')
    Администраторы
@stop

@section('content')
    <div class="element-list-wrapper user-list">
        <div class="element-container header-container">
            <div class="name">{{ trans('validation.attributes.username') }}</div>
            <div class="role"></div>
            <div class="ip">{{ trans('validation.attributes.allowed_ips') }}</div>
            <div class="creator">{{ trans('validation.attributes.creator') }}</div>
            <div class="role">{{ trans('validation.attributes.admin_role_id') }}</div>
            <div class="control">{{ trans('interactions.controls') }}</div>
        </div>

        <ul class="element-list scrollable-container">
            @foreach ($user_list as $user)
                <li>
                    <div class="element-container">
                        <div class="name">
                            <a href="{{ route('cc.admin-users.edit', [$user->id]) }}">
                                {{ $user->username }}
                            </a>
                        </div>
                        <div class="role">
                            @if ($user->super)
                                <span class="super-user">Суперпользователь</span>
                            @endif
                        </div>
                        <div class="ip">
                            @if (empty($user->allowed_ips))
                                Все IP
                            @else
                                {!! implode('<br />', $user->allowed_ips) !!}
                            @endif
                        </div>
                        <div class="creator">
                            @if ($user->parent)
                                @can('change-admin-user', $user->parent)
                                    <a href="{{ route('cc.admin-users.edit', [$user->parent->id]) }}">
                                        {{ $user->parent->username }}
                                    </a>
                                @else
                                    {{ $user->parent->username }}
                                @endcan
                            @endif
                        </div>
                        <div class="role">
                            @if ($user->role)
                                @can('change-admin-role', $user->role)
                                    <a href="{{ route('cc.admin-roles.edit', [$user->role->id]) }}">
                                        {{ $user->role->name }}
                                    </a>
                                @else
                                    {{ $user->role->name }}
                                @endcan
                            @endif
                        </div>
                        <div class="control">
                            @include('admin.admin_users._list_controls')
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div>
            <a href="{{ route('cc.admin-users.create') }}" class="btn btn-success btn-xs">Добавить администратора</a>
        </div>
    </div>
@stop
