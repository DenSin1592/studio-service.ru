<ul class="element-list @if (empty($lvl)) scrollable-container @endif" data-sortable-group="">
    @foreach ($modelList as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">

                @include('admin.shared.resource_list.sorting._list_controls')

                <div class="name">
                    <a href="{{ route($routeEdit, [$model->id]) }}"
                       style="margin-left: {{ $lvl * 0.5 }}em;"
                    >
                        {{ $model->name }}
                    </a>
                </div>

                <div class="name">
                    <a href="{{$model->service
                                    ? route(\App\Http\Controllers\Admin\EssenceControllers\ServicesController::ROUTE_EDIT, [$model->service->id])
                                    : '#'}}"
                       style="margin-left: {{ $lvl * 0.5 }}em;
                           {{$model->service ?? 'color: red'}}
                           "
                    >
                        {{ $model->service?->name ?? "Не выбрано" }}
                    </a>
                </div>

                <div class="name">
                    <a href="{{$model->targetAudience
                                    ? route(\App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController::ROUTE_EDIT, [$model->targetAudience->id])
                                    : '#'}}"
                       style="margin-left: {{ $lvl * 0.5 }}em;
                       {{$model->targetAudience ?? 'color: red'}}
                           "
                    >
                        {{ $model->targetAudience?->name ?? "Не выбрано" }}
                    </a>
                </div>

                <div class="publish-status">
                    @include('admin.shared._list_flag', [
                        'element' => $model,
                        'action' => route($routeToggleAttribute, [$model->id, 'publish']),
                        'attribute' => 'publish'
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
