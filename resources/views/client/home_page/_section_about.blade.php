<section class="section-about section-dark">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="row">
                    <div class="section-about-media-container col-12 col-sm-9 col-md-6 col-lg-5 col-xxl-6">
                        <div class="about-presentation-block">
                            <a href="javascript:void(0);" class="card-video" data-fancybox="about-video" data-src={{$page->youtube_link_about}}>
                                <figure class="card-video-figure" >
                                    <img loading="lazy" src="{{asset('/uploads/about/about-item-1.jpg')}}" alt="" class="card-video-media">
                                </figure>

                                <div class="card-video-overlay d-flex flex-column justify-content-center">
                                    <div class="form-row align-items-center">
                                        <div class="card-video-icon-container col-auto">
                                            <div class="card-video-icon d-flex align-items-center justify-content-center">
                                                <img loading="lazy" src="{{asset('images/icons/general/png/icon-play.png')}}" width="27" height="41" alt="" class="card-video-icon-media">
                                            </div>
                                        </div>

                                        <div class="card-video-typography-container col">
                                            <div class="card-video-title">Смотреть видеопрезентацию о компании СТУДИЯ-СЕРВИС</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="section-about-typography-container col-12 col-md-6 col-xxl-5 offset-lg-1">
                        <div class="section-header">
                            <div class="section-title title-h1">Коротко о нас</div>
                        </div>

                        <div class="about-description">{{$page->short_about}}</div>

                        @if($page->link_about)
                            <a href="{{$page->link_about}}" class="about-cta-btn btn btn-light btn-outline-secondary">Подробнее о нас</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
