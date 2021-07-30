@if($targetAudiences->count() > 0)

    <div style="border: 1px solid black">

        <h1>Секция Для кого мы работаем</h1>

        <a href="{{route('target-audiences')}}">смотреть все</a>

        @foreach($targetAudiences as $element)

            <div>
                <img loading="lazy" src="{{{ $element->getImgPath('icon', 'icon', 'no-image-40x40.png') }}}"
                     alt="{{$element->name}}" class="card-category-media">
                <a href="{{ $element->url}}">{{$element->name}}</a>
            </div>
        @endforeach

    </div>

@endif
