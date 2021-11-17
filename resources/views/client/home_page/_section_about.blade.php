<section class="section-about section-dark">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="row">


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
