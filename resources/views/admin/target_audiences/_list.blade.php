<ul class="element-list @if (empty($lvl)) scrollable-container @endif" data-sortable-group="">
    @foreach ($modelList as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                @include('admin.shared.resource_list.sorting._list_controls')

                <div class="name">
                    <a href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController::ROUTE_EDIT, [$model->id]) }}"
                       style="margin-left: {{ $lvl * 0.5 }}em;"
                    >
                        {{ $model->name }}
                    </a>
                </div>

                <div class="publish-status">
                   @include('admin.shared._list_flag', [
                           'element' => $model,
                           'action' => route(\App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController::ROUTE_TOGGLE_ATTRIBUTE, [$model->id, 'publish']),
                           'attribute' => 'publish'
                           ])
                </div>

                <div class="control">
                    @include('admin.shared.resource_list._control_block', [
                        'routeEdit' => route(\App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController::ROUTE_EDIT, [$model->id]),
                        'routeDestroy' => route(\App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController::ROUTE_EDIT, [$model->id])
                        ])
                </div>

            </div>

            @if (!empty($model->children))
                @include('admin.target_audiences._list', ['modelList' => $model->children, 'lvl' => $lvl + 3])
            @endif
        </li>
    @endforeach
</ul>
