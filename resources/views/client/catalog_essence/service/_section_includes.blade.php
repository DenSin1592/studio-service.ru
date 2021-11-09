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

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
