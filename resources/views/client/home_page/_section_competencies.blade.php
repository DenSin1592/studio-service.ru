
<div style="border: 1px solid black">

    <h1>Секция "Наши компетенции"</h1>

    <a href="{{route('competencies')}}">смотреть все</a>

    @foreach($competencies as $element)

        <div>
            <img loading="lazy" src="{{{ $element->getImgPath('preview_image', 'small', 'no-image-200x200.png') }}}" alt="{{$element->name}}" class="card-category-media">
            <a href="{{ $element->url}}">{{$element->name}}</a>
        </div>
    @endforeach

</div>
