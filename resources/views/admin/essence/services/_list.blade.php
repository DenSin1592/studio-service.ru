<ul class="element-list @if (empty($lvl)) scrollable-container @endif" data-sortable-group="">
    @foreach ($modelList as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                @include('admin.shared.resource_list.sorting._list_controls')

                <div class="name">
                    <a href="{{ route($routeEdit, [$model->id]) }}"
                       style="margin-left: {{ 0 * 0.5 }}em;">{{ $model->name }}</a>
                </div>

                <div class="publish-status">
                @include('admin.shared._list_flag', [
                    'element' => $model,
                    'action' => route($routeToggleAttribute, [$model->id, 'publish']),
                    'attribute' => 'publish'
                    ])
                </div>

                <div class="publish-status">
                    @include('admin.shared._list_flag', [
                        'element' => $model,
                        'action' => route($routeToggleAttribute, [$model->id, 'on_home_page']),
                        'attribute' => 'on_home_page'
                    ])
                </div>

                <div class="control">
                    @include('admin.shared.resource_list._control_block', [
                        'routeEdit' => route($routeEdit, [$model->id]),
                        'routeDestroy' => route($routeDestroy, [$model->id])
                        ])
                </div>

            </div>

            @if (!empty($model->children))
                @include($viewListName, ['modelList' => $model->children, 'lvl' => $lvl + 3])
            @endif
        </li>
    @endforeach
</ul>
