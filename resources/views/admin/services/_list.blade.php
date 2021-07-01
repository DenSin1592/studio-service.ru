<ul class="element-list scrollable-container" data-sortable-group="">
    @foreach ($models as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                @include('admin.shared.resource_list.sorting._list_controls', ['model' => $model])

                <div class="name">
                    <a href="{{ route(\App\Http\Controllers\Admin\ServicesController::ROUTE_EDIT, [$model->id]) }}"
                       style="margin-left: {{ 0 * 0.5 }}em;">{{ $model->name }}</a>
                </div>

                @include('admin.shared._list_flag', ['element' => $model, 'action' => route(\App\Http\Controllers\Admin\ServicesController::ROUTE_TOGGLE_ATTRIBUTE, [$model->id, 'publish']), 'attribute' => 'publish'])

                <div class="control">
                    @include('admin.services._control_block', ['model' => $model])
                </div>

            </div>
        </li>
    @endforeach
</ul>
