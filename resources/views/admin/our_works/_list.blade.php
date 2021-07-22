<ul class="element-list @if (empty($lvl)) scrollable-container @endif" data-sortable-group="">
    @foreach ($modelList as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                @include('admin.shared.resource_list.sorting._list_controls')

                <div class="name">
                    <a href="{{ route(\App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_EDIT, $model->id) }}"
                       style="margin-left: {{ $lvl * 0.5 }}"
                    >
                        {{ $model->name }}
                    </a>
                </div>

                <div class="content">
                    {{\Str::words(strip_tags($model->text), 15, '...')}}
                </div>

                <div class="review_date">
                    {{{ date('d.m.Y H:i', strtotime( $model->review_date )) }}}
                </div>

                <div class="publish-status">
                    @include('admin.shared._list_flag', [
                       'element' => $model,
                       'action' => route(\App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_TOGGLE_ATTRIBUTE, [$model->id, 'publish']),
                       'attribute' => 'publish'
                       ])
                </div>

                <div class="control">
                    @include('admin.shared.resource_list._control_block', [
                        'routeEdit' => route(\App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_EDIT, [$model->id]),
                        'routeDestroy' => route(\App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_DESTROY, [$model->id])
                        ])
                </div>

            </div>

            @if (!empty($model->children))
                @include('admin.reviews._list', ['modelList' => $model->children, 'lvl' => $lvl + 3])
            @endif
        </li>
    @endforeach
</ul>
