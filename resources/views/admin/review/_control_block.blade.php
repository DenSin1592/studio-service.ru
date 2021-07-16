{{-- Control block for exact type in the list --}}

<a class="glyphicon glyphicon-pencil"
   title="{{ trans('interactions.edit') }}"
   href="{{ route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_EDIT, $review->id) }}"></a>
<a class="glyphicon glyphicon-trash"
   title="{{ trans('interactions.delete') }}"
   data-method="delete"
   data-confirm="Вы уверены, что хотите удалить данный отзыв?"
   href="{{ route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_DESTROY, [$review->id]) }}"></a>
