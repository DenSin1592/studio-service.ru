{{-- Buttton to delete product --}}

<a class="btn btn-danger"
   data-method="delete"
   data-confirm="Вы уверены, что хотите удалить данную услугу?"
   href="{{ route(\App\Http\Controllers\Admin\ServicesController::ROUTE_DESTROY, [$model->id]) }}">{{ trans('interactions.delete') }}</a>
