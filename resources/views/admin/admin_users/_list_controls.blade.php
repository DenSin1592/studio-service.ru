<a class="glyphicon glyphicon-pencil"
   title="{{ trans('interactions.edit') }}"
   href="{{ route(\App\Http\Controllers\Admin\AdminUsersController::ROUTE_EDIT, [$user->id]) }}"></a>

@if (Auth::user()->super)
    <a class="glyphicon glyphicon-trash"
       title="{{ trans('interactions.delete') }}"
       data-method="delete"
       data-confirm="Вы уверены, что хотите удалить данного администратора?"
       href="{{ route(\App\Http\Controllers\Admin\AdminUsersController::ROUTE_DESTROY, [$user->id]) }}"></a>
@else

    <span class="glyphicon glyphicon-trash" title="{{ trans('alerts.delete_is_disallowed') }}"></span>
@endif
