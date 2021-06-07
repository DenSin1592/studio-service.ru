<a class="glyphicon glyphicon-pencil"
   title="{{ trans('interactions.edit') }}"
   href="{{ route('cc.admin-roles.edit', [$role->id]) }}"></a>

@if (false) {{-- TODO check ability to delete role --}}
    <span class="glyphicon glyphicon-trash" title="{{ trans('alerts.delete_is_disallowed') }}"></span>
@else
    <a class="glyphicon glyphicon-trash"
       title="{{ trans('interactions.delete') }}"
       data-method="delete"
       data-confirm="Вы уверены, что хотите удалить данную роль?"
       href="{{ route('cc.admin-roles.destroy', [$role->id]) }}"></a>
@endif
