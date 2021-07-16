<ul class="element-list scrollable-container">
    @foreach ($reviewList as $review)
        <li data-element-id="{{ $review->id }}">
            <div class="element-container">
                <div class="id">
                    {{ $review->id }}
                </div>

                <div class="name">
                    <a href="{{ route('cc.reviews.edit', $review->id) }}">{{ $review->name }}</a>
                </div>

                <div class="content">
                    {{\Str::words(strip_tags($review->text), 15, '...')}}
                </div>

                <div class="review_date">
                    {{{ date('d.m.Y H:i', strtotime( $review->review_date )) }}}
                </div>

                <div class="publish">
                    @include('admin.shared._list_flag', [
                       'element' => $review,
                       'action' => route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_TOGGLE_ATTRIBUTE, [$review->id, 'publish']),
                       'attribute' => 'publish'
                       ])
                </div>

                <div class="publish">
                    @include('admin.shared._list_flag', [
                       'element' => $review,
                       'action' => route(\App\Http\Controllers\Admin\ReviewsController::ROUTE_TOGGLE_ATTRIBUTE, [$review->id, 'on_home_page']),
                       'attribute' => 'on_home_page'
                       ])
                </div>

                <div class="control">
                    @include('admin.review._control_block', ['review' => $review])
                </div>

            </div>
        </li>
    @endforeach
</ul>
