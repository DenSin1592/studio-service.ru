{{-- Buttton to delete node --}}

<a class="btn btn-danger"
   data-method="delete"
   data-confirm="Вы уверены, что хотите удалить данную страницу?"
   href="{{ route(\App\Http\Controllers\Admin\StructureController::ROUTE_DESTROY, $node->id) }}">{{ trans('interactions.delete') }}</a>
