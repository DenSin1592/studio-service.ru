<fieldset class="bordered-group">
    <legend>Блок добавления контента</legend>

    <ul class="grouped-field-list content-block-list" data-element-list="container" id="{{$relation}}-list">
        @foreach ($formData[$relation] as $key => $element)
            @include('admin.essence.competencies._content_blocks._content_block')
        @endforeach
    </ul>

    <span class="btn btn-default btn-xs grouped-field-list-add"
          data-element-list="add"
          data-element-list-target="#{{$relation}}-list"
          data-load-element-url="{{{ $routeCreate }}}">Добавить блок контента</span>
</fieldset>
