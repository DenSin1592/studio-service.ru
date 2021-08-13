<section class="section-video">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <a href="javascript:void(0);" class="card-video card-video-lg" data-fancybox="about-video" data-src="{{$model->section_video_link_youtube}}" >
                    <figure class="card-video-figure" >
                        <img loading="lazy" src="{{$model->getImgPath('section_video_image', 'main', 'no-image-500x500.png')}}" alt="" class="card-video-media">
                    </figure>

                    <div class="card-video-overlay d-flex flex-column justify-content-center">
                        <div class="form-row align-items-center">
                            <div class="card-video-icon-container col-auto">
                                <div class="card-video-icon d-flex align-items-center justify-content-center">
                                    <img loading="lazy" src="images/icons/general/png/icon-play.png" width="27" height="41" alt="" class="card-video-icon-media">
                                </div>
                            </div>

                            <div class="card-video-typography-container col">
                                <div class="card-video-title">{{$model->section_video_name}}</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
