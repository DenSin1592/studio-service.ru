{!! Form::tbSelect2($fieldName,
    (!empty($formData[$relationName]) ? [$formData[$relationName]->id => $formData[$relationName]->name . ' [id = ' . $formData[$relationName]->id . ']'] : []),
    null,
    [
        'data-search-url' => route($routeSearch),
        'style' => 'display: inline-block',
        'data-edit-url-name' => $routeEdit,
        'data-show_on-site-url-name' => $routeShowOnSite,
    ]) !!}

<div class="model-edit-links inline-block {!! !isset($formData[$relationName]) ? 'dnone' : '' !!}">

    <a data-edit-link
       href="{!! isset($formData[$relationName]) ? route($routeEdit, $formData[$relationName]->id) : '#' !!}"
       target="_blank"
       title="Редактировать модель"
       class="glyphicon glyphicon-share">
    </a>

    <a data-site-link
       href="{!! (isset($formData[$relationName]) && $formData[$relationName]->publish) ? route($routeShowOnSite, $formData[$relationName]->alias) : '#' !!}"
       @if (!(isset($formData[$relationName]) && $formData[$relationName]->publish))
       style="display: none"
       @endif
       target="_blank"
       title="Смотреть на сайте"
       class="glyphicon glyphicon-share-alt">
    </a>

</div>
