<div class="action-bar">
    <button type="submit" class="btn btn-success">{{ trans('interactions.save') }}</button>
    <button type="submit" class="btn btn-primary" name="redirect_to" value="index">{{ trans('interactions.save_and_back_to_list') }}</button>

    <a class="btn btn-danger"
       data-method="delete"
       data-confirm="Вы уверены, что хотите удалить данную страницу?"
       href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\StructureController::ROUTE_DESTROY, $node->id) }}">{{ trans('interactions.delete') }}
    </a>

    <a href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\StructureController::ROUTE_EDIT, [$node->id]) }}" class="btn btn-default">{{ trans('interactions.edit') }}</a>
    <a href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\StructureController::ROUTE_INDEX) }}" class="btn btn-default">{{ trans('interactions.back_to_list') }}</a>
    @if ($node->publish)
        @include('admin.shared._show_on_site_button', ['url' => TypeContainer::getClientUrl($node)])
    @endif
</div>
