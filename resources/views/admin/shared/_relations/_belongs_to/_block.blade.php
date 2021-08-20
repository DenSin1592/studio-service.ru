{!! Form::tbSelect2($fieldName,
    (!empty($formData[$relationName]) ? [$formData[$relationName]->id => $formData[$relationName]->name . ' [id = ' . $formData[$relationName]->id . ']'] : []),
    null,
    [
        'data-search-url' => route($routeSearch),
        'style' => 'display: inline-block',
        'data-edit-url-name' => $routeEdit,
        'data-show_on-site-url-name' => $routeShowOnSite,
    ]) !!}

@if(isset($formData[$relationName]))
    <div class="model-edit-links inline-block">

        <a data-edit-link
           href="{!! route($routeEdit, $formData[$relationName]->id) !!}"
           target="_blank"
           title="Редактировать модель"
           class="glyphicon glyphicon-share">
        </a>

        @if ($formData[$relationName]->publish)
            <a data-site-link
               href="{!! route($routeShowOnSite, $formData[$relationName]->alias) !!}"

               style="display: none"

               target="_blank"
               title="Смотреть на сайте"
               class="glyphicon glyphicon-share-alt">
            </a>
        @elseif(isset($errorPublishMessage))
            <span style="color: red">{!! $errorPublishMessage !!}</span>
        @endif


    </div>
@endif
