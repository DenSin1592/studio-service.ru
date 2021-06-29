{{-- Buttton to delete product --}}

<a class="btn btn-danger"
   data-method="delete"
   data-confirm="Вы уверены, что хотите удалить данную компетенцию?"
   href="{{ route(\App\Http\Controllers\Admin\CompetenciesController::ROUTE_DESTROY, [$model->id]) }}">{{ trans('interactions.delete') }}</a>
