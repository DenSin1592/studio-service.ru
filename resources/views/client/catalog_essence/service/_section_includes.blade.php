<section class="section-includes section-purple-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <div class="section-header">
                    <div class="section-title title-h1 text-center">{{$model->section_tabs_name}}</div>
                </div>

                <ul class="includes-nav nav nav-tabs d-flex align-items-center justify-content-center" role="tablist">
                    @foreach($model->tabs as $element)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if($loop->first) active @endif" id="include-tab{{$element->id}}"
                               data-toggle="tab" href="#include-{{$element->id}}" role="tab"
                               aria-controls="include-{{$element->id}}"
                               aria-selected="@if($loop->first) true @else false @endif">{{$element->tab_name}}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="includes-nav-hint text-center">{{$model->section_tabs_description}}</div>

                <div class="includes-tab-content tab-content">

                    @foreach($model->tabs as $element)
                        <div class="tab-pane fade @if($loop->first) active show @endif" id="include-{{$element->id}}" role="tabpanel" aria-labelledby="include-tab{{$element->id}}">

                            <div class="swiper-includes-cover swiper-cover">
                                <div class="swiper-includes swiper-container">
                                    <div class="swiper-wrapper d-flex flex-nowrap">

                                                    @foreach($element->contentBlocks as $subElement)
                                            @if($loop->first || $loop->iteration % 3 === 1)
                                        <div class="swiper-slide col-12">
                                            <div class="includes-grid">
                                                <div class="row no-gutters">
                                                    <div class="include-column col-md-6 d-flex">

                                                        <a href="{{$subElement->link ?? 'javascript:void(0)'}}" class="card-include @if($subElement->white_text) card-include-dark @endif d-flex flex-column align-items-start flex-grow-1" style="background-image: url('{{$subElement->getImgPath('image', 'main', 'no-image-500x500.png')}}');"> <span class="card-include-title d-block">{{$subElement->name}}</span> <span class="card-include-description d-block">{{$subElement->description}}</span> <span class="card-include-cta btn btn-outline-dark">Подробнее</span></span> </a>
                                                    </div>
                                                    <div class="include-column col-md-6 d-flex flex-column">
                                                    @endif


                                                        @if($loop->iteration % 3 === 2)
                                                            <a href="{{$subElement->link ?? 'javascript:void(0)'}}" class="card-include card-include-sm @if($subElement->white_text) card-include-dark @endif d-flex flex-column align-items-start flex-grow-1" style="background-image: url('{{$subElement->getImgPath('image', 'main', 'no-image-500x500.png')}}');"> <span class="card-include-title d-block">{{$subElement->name}}</span> <span class="card-include-description d-none d-lg-block">{{$subElement->description}}</span> <span class="card-include-cta btn btn-outline-dark">Подробнее</span> </a>
                                                        @endif

                                                        @if($loop->iteration % 3 === 0)
                                                            <a href="{{$subElement->link ?? 'javascript:void(0)'}}" class="card-include card-include-sm @if($subElement->white_text) card-include-dark @endif d-flex flex-column align-items-start flex-grow-1" style="background-image: url('{{$subElement->getImgPath('image', 'main', 'no-image-500x500.png')}}');"> <span class="card-include-title d-block">{{$subElement->name}}</span> <span class="card-include-description d-none d-lg-block">{{$subElement->description}}</span> <span class="card-include-cta btn btn-outline-dark">Подробнее</span> </a>
                                                        @endif


                                                    @if($loop->last || $loop->iteration % 3 === 0)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <button type="button" class="swiper-includes-button-prev swiper-button-prev d-flex align-items-center justify-content-center"> <svg class="swiper-button-prev-media" width="19" height="19"> <use xlink:href="/images/icons/sprite.svg#icon-angle-left"></use> </svg> </button> <button type="button" class="swiper-includes-button-next swiper-button-next d-flex align-items-center justify-content-center"> <svg class="swiper-button-next-media" width="19" height="19"> <use xlink:href="/images/icons/sprite.svg#icon-angle-right"></use> </svg> </button></div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
