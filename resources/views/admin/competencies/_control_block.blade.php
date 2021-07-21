{{-- Control block for exact node in list --}}

<a class="glyphicon glyphicon-pencil"
   title="{{ trans('interactions.edit') }}"
   href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\CompetenciesController::ROUTE_EDIT, [$model->id]) }}">
</a>
<a class="glyphicon glyphicon-trash"
   title="{{ trans('interactions.delete') }}"
   data-method="delete"
   data-confirm="Вы уверены, что хотите удалить данную компетенцию?"
   href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\CompetenciesController::ROUTE_DESTROY, [$model->id]) }}">
</a>

