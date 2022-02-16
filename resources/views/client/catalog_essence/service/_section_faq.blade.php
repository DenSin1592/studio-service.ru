<section class="section-faq">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="section-header">
                    <div class="section-title title-h1">{{$model->section_faq_name}}</div>
                </div>

                <div class="faq-accordion accordion" id="faq-accordion">

                    @foreach($model->faqQuestions as $element)
                        <div class="card-accordion">
                            <div class="card-accordion-header" id="faq-heading-{{$element->id}}">
                                <button class="card-accordion-title title-h3 d-flex align-items-center" type="button" data-toggle="collapse"
                                        data-target="#faq-collapse-{{$element->id}}" aria-expanded="false" aria-controls="faq-collapse-{{$element->id}}">
                                    {{$element->name}}
                                </button>
                            </div>

                            <div id="faq-collapse-{{$element->id}}" class="card-accordion-collapse collapse" aria-labelledby="faq-heading-{{$element->id}}">
                                <div class="card-accordion-content">
                                    <div class="row">
                                        @if(($imagePath = $element->getImgPath('image', 'main')) !== '')
                                            <div class="card-accordion-media-container col-md-4 col-xl-4 col-xxl-5 order-md-1">
                                                <div class="card-accordion-thumbnail">
                                                    <img loading="lazy" src="{{$imagePath}}"  width="474" height="362" alt="{{$element->name}}" class="card-accordion-media">
                                                </div>
                                            </div>
                                        @endif

                                        <div class="card-accordion-typogrpahy-container col-md-8 col-xl-8 col-xxl-7 order-md-0">
                                            {!! $element->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
