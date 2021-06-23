<ul class="element-list @if (empty($lvl)) scrollable-container @endif" data-sortable-group="">
    @foreach ($modelTree as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                @include('admin.shared.resource_list.sorting._list_controls', ['model' => $model])

                <div class="name">
                    <a href="{{ route('cc.target-audiences.edit', [$model->id]) }}"
                       style="margin-left: {{ $lvl * 0.5 }}em;">{{ $model->name }}</a>
                </div>

                @include('admin.shared._list_flag', ['element' => $model, 'action' => route('cc.target-audiences.toggle-attribute', [$model->id, 'publish']), 'attribute' => 'publish'])

                <div class="control">
                    @include('admin.target_audience._control_block', ['model' => $model])
                </div>

            </div>

            @if (count($model->children) > 0)
                @include('admin.target_audience._list', ['modelTree' => $model->children, 'lvl' => $lvl + 3])
            @endif
        </li>
    @endforeach
</ul>
