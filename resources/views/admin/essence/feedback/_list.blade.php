<ul class="element-list @if (empty($lvl)) scrollable-container @endif" data-sortable-group="">
    @foreach ($modelList as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                <div class="id">{!! $model->id !!}</div>

                <div class="status {{ $model->status === \App\Models\Feedback::STATUS_NEW ? 'text-success' : '' }} {{ $model->status === \App\Models\Feedback::STATUS_IN_PROGRESS ? 'text-warning' : '' }}">
                    {{ trans("validation.model_values.feedback.status.{$model->status}") }}
                </div>

                @include('admin.shared.device_type._list_column')

                <div class="name">
                        {{ $model->name }}
                </div>

                <div class="name">
                    <a href="{{ route($routeEdit, [$model->id]) }}"
                       style="margin-left: {{ $lvl * 0.5 }}em;"
                    >
                        {{ $model->phone }}
                    </a>
                </div>

                <div class="created_at">{{ $model->created_at->format('d.m.Y H:i') }}</div>

                <div class="control">
                    @include('admin.shared.resource_list._control_block', [
                        'routeEdit' => route($routeEdit, [$model->id]),
                        'routeDestroy' => route($routeDestroy, [$model->id])
                        ])
                </div>

            </div>

        </li>
    @endforeach
</ul>
