<div style="border: 1px solid black">

    <h1>Секция Для кого мы работаем</h1>

    <a href="{{route('target-audiences')}}">смотреть все</a>

    @foreach($targetAudiences as $element)

        <div>
            <img loading="lazy" src="{{{ $element->getImgPath('icon', 'icon', 'no-image-40x40.png') }}}" alt="{{$element->name}}" class="card-category-media">
            <a href="{{ $element->url}}">{{$element->name}}</a>
        </div>
    @endforeach

</div>

{{--
@if ($article->getAttachment('image')->exists())
    "background-image: url('{{{ asset($article->getAttachment('image')->getRelativePath('picture'))}}}')"
@else
    "background-image: url('{{{asset('/images/common/no-image/no-image-500x500.png')}}}')"
@endif
<img loading="lazy" src="{{{ $productData['image']->getAttachment('image')->getUrl('list') }}}"
     alt="{{ $productData['customName'] ?? $productData['product']->name }}"
     title="{{ $productData['customName'] ?? $productData['product']->out_name }}"
     class="card-product-media">--}}
