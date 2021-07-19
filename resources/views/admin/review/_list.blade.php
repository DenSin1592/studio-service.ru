<ul class="element-list scrollable-container">
    @foreach ($modelList as $model)
        <li data-element-id="{{ $model->id }}">
            <div class="element-container">
                <div class="id">
                    {{ $model->id }}
                </div>

                <div class="name">
                    <a href="{{ route('cc.reviews.edit', $model->id) }}">{{ $model->name }}</a>
                </div>

                <div class="content">
                    {{\Str::words(strip_tags($model->text), 15, '...')}}
                </div>

                <div class="review_date">
                    {{{ date('d.m.Y H:i', strtotime( $model->review_date )) }}}
                </div>

                <div class="publish">
                    @include('admin.shared._list_flag', [
                       'element' => $model,
                       'action' => route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_TOGGLE_ATTRIBUTE, [$model->id, 'publish']),
                       'attribute' => 'publish'
                       ])
                </div>

                <div class="publish">
                    @include('admin.shared._list_flag', [
                       'element' => $model,
                       'action' => route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_TOGGLE_ATTRIBUTE, [$model->id, 'on_home_page']),
                       'attribute' => 'on_home_page'
                       ])
                </div>

                <div class="control">
                    @include('admin.review._control_block', ['review' => $model])
                </div>

            </div>
        </li>
    @endforeach
</ul>
