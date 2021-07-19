{{-- Control block for exact type in the list --}}

<a class="glyphicon glyphicon-pencil"
   title="{{ trans('interactions.edit') }}"
   href="{{ route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_EDIT, $model->id) }}"></a>
<a class="glyphicon glyphicon-trash"
   title="{{ trans('interactions.delete') }}"
   data-method="delete"
   data-confirm="Вы уверены, что хотите удалить данный отзыв?"
   href="{{ route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_DESTROY, [$model->id]) }}"></a>
