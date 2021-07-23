<ul class="element-list @if (empty($lvl)) scrollable-container @endif" data-sortable-group="">
    @foreach ($modelList as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                @include('admin.shared.resource_list.sorting._list_controls')

                <div class="name">
                    <a href="{{ TypeContainer::getContentUrl($model) }}"
                       style="margin-left: {{ $lvl * 0.5 }}em;"
                    >
                        {{ $model->name }}
                    </a>
                </div>

                <div class="publish-status">
                    @include('admin.shared._list_flag', ['element' => $model, 'action' => route($routeToggleAttribute, [$model->id, 'publish']), 'attribute' => 'publish'])
                </div>

                <div class="menu_top-status">
                    @include('admin.shared._list_flag', ['element' => $model, 'action' => route($routeToggleAttribute, [$model->id, 'menu_top']), 'attribute' => 'menu_top'])
                </div>

                <div class="menu_bottom-status">
                    @include('admin.shared._list_flag', ['element' => $model, 'action' => route($routeToggleAttribute, [$model->id, 'menu_bottom']), 'attribute' => 'menu_bottom'])
                </div>

                <div class="alias">
                    <a href="{{ TypeContainer::getClientUrl($model, true) }}" target="_blank">
                        {{ TypeContainer::getClientUrl($model, false) }}
                    </a>
                </div>

                <div class="type">
                    {{ TypeContainer::getTypeName($model->type) }}
                </div>

                <div class="control">
                    <a class="glyphicon glyphicon-pencil"
                       title="{{ trans('interactions.edit') }}"
                       href="{{ TypeContainer::getContentUrl($model) }}"></a>
                    <a class="glyphicon glyphicon-wrench"
                       title="{{ trans('interactions.properties') }}"
                       href="{{ route($routeEdit, [$model->id]) }}"></a>
                    <a class="glyphicon glyphicon-trash"
                       title="{{ trans('interactions.delete') }}"
                       data-method="delete"
                       data-confirm="Вы уверены, что хотите удалить данную страницу?"
                       href="{{ route($routeDestroy, [$model->id]) }}"></a>
                </div>
            </div>

            @if (!empty($model->children))
                @include($viewListName, ['modelList' => $model->children, 'lvl' => $lvl + 3])
            @endif

        </li>
    @endforeach
</ul>
