{{-- Buttton to delete product --}}

<a class="btn btn-danger"
   data-method="delete"
   data-confirm="Вы уверены, что хотите удалить данную ЦА?"
   href="{{ route(\App\Http\Controllers\Admin\TargetAudiencesController::ROUTE_DESTROY, [$model->id]) }}">{{ trans('interactions.delete') }}</a>
