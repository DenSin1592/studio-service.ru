@if($reviews->count() > 0)

    <div style="border: 1px solid black">

        <h1>Секция Отзывы</h1>

        <a href="{{route('reviews')}}">смотреть все</a>

        @foreach($reviews as $element)

            <div>
                <a data-fancybox="testimonial-video" data-src="{{$element->youtube_link}}"
                   class="card-testimonial-thumbnail card-testimonial-video-thumbnail">
                    видео
                </a>

                <img loading="lazy"
                     src="{{{ $element->images->first()?->getImgPath('image', 'preview', 'no-image-200x200.png') ?? asset('/images/common/no-image/no-image-200x200.png') }}}"
                     alt="{{$element->name}}" class="card-category-media">
                <span>{{$element->name}}</span>
            </div>

            <div>
                @foreach($element->services as $elem)
                    <div><a href="{{ $elem->url}}">{{$elem->name}}</a></div>
                @endforeach
            </div>

        @endforeach
    </div>

@endif
