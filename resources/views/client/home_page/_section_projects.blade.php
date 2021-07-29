<div style="border: 1px solid black">

    <h1>Секция Проекты</h1>

    <a href="{{route('our-works')}}">смотреть все</a>

    @foreach($projects as $element)

        <div>
            <img loading="lazy" src="{{{ $element->getImgPath('preview_image', 'main', 'no-image-800x800.png') }}}" alt="{{$element->name}}" class="card-category-media">
            <span>{{$element->name}}</span>
        </div>

    <div>{{$element->preview}}</div>

        <div>
            @foreach($element->services as $elem)
                <div><a href="{{ $elem->url}}">{{$elem->name}}</a></div>
            @endforeach
        </div>
        <div><a href="{{$element->url}}">более подробно о проекте</a></div>
    @endforeach
</div>
