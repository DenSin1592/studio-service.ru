
<div style="border: 1px solid black">

    <h1>Секция Услуги</h1>

    <a href="{{route('services')}}">смотреть все</a>

    @foreach($services as $element)

        <div>
            <img loading="lazy" src="{{{ $element->getImgPath('preview_image', 'small', 'no-image-200x200.png') }}}" alt="{{$element->name}}" class="card-category-media">
            <a href="{{ $element->url}}">{{$element->name}}</a>
        </div>

    @if(count($element->tasks) > 0)
        <div>
            <div>какие задачи решает</div>
            @foreach($element->tasks as $elem)
                <img loading="lazy" src="{{$elem->getImgPath('icon', 'icon', 'no-image-40x40.png')}}" alt="" width="35" height="29" class="card-service-include-media">
            <span>{{$elem->title}}}</span>
            @endforeach
        </div>
        @endif
    @endforeach


</div>
