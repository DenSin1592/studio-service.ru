<li style="width: 100%;" data-element-list="element" data-element-key="{{ $key }}" class="content-block-element {{{ (\Request::old("{$relation}.{$key}.full_info") == 1 || !$element->exists) ? 'show-full-info' : '' }}}">

    <div class="controls">
        <span class="btn btn-default btn-xs toggle-info toggle-full-info glyphicon glyphicon-menu-down"></span>
        <span class="btn btn-default btn-xs toggle-info toggle-short-info glyphicon glyphicon-menu-up"></span>
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("{$relation}[{$key}][full_info]", 0, ['data-full-info-state' => '']) }}
    {{ Form::hidden("{$relation}[{$key}][id]", $element->id) }}

    <div class="short-info">
        {!! Form::tbTextBlock("{$relation}[{$key}][tab_name]", trans('validation.attributes.tab_name'), $element->tab_name, ['disabled' => true]) !!}
    </div>

    <div class="full-info">
        {{ Form::tbLabel("{$relation}[{$key}][tab_name]", trans('validation.attributes.tab_name')) }}
        {{ Form::tbText("{$relation}[{$key}][tab_name]", $element->tab_name) }}
    </div>

    <div class="full-info">

        {!! Form::tbCheckboxBlock("{$relation}[{$key}][publish]", trans('validation.attributes.publish'), $element->publish) !!}

        {{ Form::tbLabel("{$relation}[{$key}][position]", trans('validation.attributes.position')) }}
        {{ Form::tbText("{$relation}[{$key}][position]", $element->position) }}


        <fieldset class="bordered-group">
            <legend>Контент</legend>

            <p><em> Рекомендовано добавлять блоки кратно двум или кратно трём.</em></p>
            <p><em> Изображение первого блока - большое. Изображения 2-3 блока - маленькие</em></p>
            <p><em> Если третье изображение не загружено - второе станет большим. </em></p>
            <p><em>Рекомендуемый размер для больших изображений - 700х604 px.</em></p>
            <p><em>Для маленьких - 700х302 px.</em></p>

            <ul class="grouped-field-list content-block-list" data-element-list="container" id="{{'blockable'}}-list{{$key}}">
                @foreach ($element->contentBlocks()->orderBy('position')->get() as $key_two_level => $childElement)
                    @include(\App\Http\Controllers\Admin\Relations\Offers\TabsContentBlockController::VIEW_ELEMENT_NAME, ['element' => $childElement , 'child_relation' => \App\Http\Controllers\Admin\Relations\Offers\TabsContentBlockController::RELATIONS_NAME])
                @endforeach
            </ul>

            <span class="btn btn-default btn-xs grouped-field-list-add"
                  data-element-list="add"
                  data-element-list-target="#{{'blockable' }}-list{{$key}}"
                  data-load-element-url="{{{route(\App\Http\Controllers\Admin\Relations\Offers\TabsContentBlockController::ROUTE_CREATE)}}}">Добавить</span>
        </fieldset>
    </div>

</li>
