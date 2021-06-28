<a class="glyphicon glyphicon-pencil"
   title="{{ trans('interactions.edit') }}"
   href="{{ route(\App\Http\Controllers\Admin\AdminRolesController::ROUTE_EDIT, [$role->id]) }}"></a>

@if (\Auth::user()->super)
    <a class="glyphicon glyphicon-trash"
       title="{{ trans('interactions.delete') }}"
       data-method="delete"
       data-confirm="Вы уверены, что хотите удалить данную роль?"
       href="{{ route(\App\Http\Controllers\Admin\AdminRolesController::ROUTE_DESTROY, [$role->id]) }}"></a>
@else
    <span class="glyphicon glyphicon-trash" title="{{ trans('alerts.delete_is_disallowed') }}"></span>
@endif
