<a href="{{$model->url}}" class="card-service d-flex flex-column">
    <div class="card-service-thumbnail">
        <img loading="lazy"
             src="{{{ $model->getImgPath('preview_image', 'main', 'no-image-200x200.png') }}}"
             alt="{{$model->name}}"
             class="card-service-media">
    </div>

    <div class="card-service-title">
        {{$model->name}}
    </div>

    @if(isset($relations))
        @if($relations === 'targetAudiences')
            @if($model->targetAudiences->count() > 0)
                <div class="card-service-include-block">
                    <div class="card-service-include-title">Предлагаем для:</div>

                    <ul class="card-service-include-list card-service-include-vertical-list @if($blackTaskIcon) card-service-include-pills-list @endif list-unstyled d-flex flex-wrap flex-column align-items-start">
                        @foreach($model->targetAudiences as $elem)

                            <li onclick="location.href='/offery/{{ $elem->pivot->alias }}'"  class="card-service-include-item d-flex align-items-center justify-content-center" >
                                <div class="card-service-include d-flex align-items-center">
                                    <div class="card-service-include-thumbnail d-flex align-items-center justify-content-center">
                                        <img loading="lazy"
                                            src="{{$elem->getImgPath('icon', null, 'no-image-40x40.png')}}" alt=""
                                            width="35" height="29" class="card-service-include-media">
                                    </div>

                                    <div class="card-service-include-content">
                                        <div class="card-service-include-value">{{$elem->name}}</div>
                                    </div>
                                </div>
                            </li>

                        @endforeach
                    </ul>
                </div>
            @endif
        @endif

        @if($relations === 'tasks')
            @if($model->tasks->count() > 0)
                <div class="card-service-include-block">
                    <div class="card-service-include-title">Какие задачи решает:</div>

                    <ul class="card-service-include-list @if($blackTaskIcon) card-service-include-pills-list @endif list-unstyled d-flex flex-wrap align-items-center">
                        @foreach($model->tasks as $elem)
                            <li class="card-service-include-item d-flex align-items-center justify-content-center"
                                @if($seeTaskDescriptionTooltip)
                                data-toggle="tooltip"
                                data-placement="bottom"
                                title="{{$elem->text}}"
                                @endif
                            >
                                <img loading="lazy"
                                     src="{{$elem->getImgPath('icon', null, 'no-image-40x40.png')}}" alt=""
                                     width="35" height="29" class="card-service-include-media">
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
    @endif

    <div class="card-service-cta d-flex align-items-center justify-content-center">
        <svg class="card-service-cta-media" width="19" height="19">
            <use xlink:href="{{asset('images/icons/sprite.svg#icon-arrow-to-right')}}"></use>
        </svg>
    </div>
</a>
