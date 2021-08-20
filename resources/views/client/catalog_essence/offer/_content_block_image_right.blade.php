<section class="section-content">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="row">

                    <div class="section-typography-container col-12 col-md-6 col-xxl-6">
                        <div class="section-header">
                            <div class="section-title title-h1">{{$element->name}}</div>
                        </div>

                        <div class="section-description">{{$element->content}}</div>
                    </div>

                    <div class="section-media-container col-12 col-md-6 col-xxl-6">
                        <div class="section-thumbnail">
                            <img src="{{$element->getImgPath('image', 'main', 'no-image-500x500.png')}}" width="619" height="425" alt="" class="section-media">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
