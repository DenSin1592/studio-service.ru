@if(\Auth::user()->super && $user->super)
    {{-- nothing --}}
@else
    {!! Form::tbFormGroupOpen('admin_role_id') !!}
        {!! Form::tbLabel('admin_role_id', trans('validation.attributes.admin_role_id')) !!}
        {!! Form::tbSelect('admin_role_id', $available_roles, null, []) !!}
    {!! Form::tbFormGroupClose() !!}
@endif