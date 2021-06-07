@extends('admin.layouts.default')
{{-- Layout for role forms --}}

@section('main_menu_class', 'closed')

@section('second_column')
    {!! Html::additionalMenuOpen(['resize' => 'admin-roles']) !!}
        <div class="menu-wrapper">
            <div class="menu-header">
                <a href="{{ route('cc.admin-roles.index') }}">Роли администраторов</a>
            </div>

            <ul class="scrollable-container">
                @foreach ($role_list as $r)
                    <li>
                        <div class="menu-element {{ $role->id == $r->id ? 'active' : '' }}">
                            <div class="name">
                                <a href="{{ route('cc.admin-roles.edit', [$r->id]) }}"
                                   title="{{ $r->name }}">{{ $r->name }}</a>
                            </div>
                            <div class="control">
                                @include('admin.admin_roles._list_controls', ['role' => $r])
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="menu-footer">
                <a href="{{ route('cc.admin-roles.create') }}" class="btn btn-success btn-xs">Добавить роль</a>
            </div>
        </div>
    {!! Html::additionalMenuClose() !!}
@stop

@section('content')

    {!! Form::tbRestfulFormOpen($role, $errors, 'cc.admin-roles', ['id' => 'admin_role_form']) !!}

        {!! Form::tbFormGroupOpen('name') !!}
            {!! Form::tbLabel('name', trans('validation.attributes.name')) !!}
            {!! Form::tbText('name') !!}
        {!! Form::tbFormGroupClose() !!}

        @include('admin.admin_roles._abilities_field')

        {!! Form::tbCheckboxBlock('seo') !!}

        @include('admin.shared._model_timestamps', ['model' => $role])

        <div class="action-bar">
            @yield('submit_block')
        </div>

    {!! Form::close() !!}

@stop
