<a href="{{$model->url}}" class="card-expertise @if(!$model->black_header_preview) card-expertise-dark @endif">
    <div class="card-expertise-thumbnail">
        <img loading="lazy" src="{{{ $model->getImgPath('preview_image', 'main', 'no-image-200x200.png') }}}"
             alt="{{$model->name}}" class="card-expertise-media">
    </div>

    <div class="card-expertise-title">{{$model->name}}</div>
</a>
