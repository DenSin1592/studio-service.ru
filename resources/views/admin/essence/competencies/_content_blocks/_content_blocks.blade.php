<fieldset class="bordered-group">
    <legend>Блок добавления контента</legend>

    <ul class="grouped-field-list content-block-list" data-element-list="container" id="tasks-list">
        @foreach ($elements as $key => $element)
            @include('admin.essence.competencies._content_blocks._content_block')
        @endforeach
    </ul>

    <span class="btn btn-default btn-xs grouped-field-list-add"
          data-element-list="add"
          data-element-list-target="#tasks-list"
          data-load-element-url="{{{ $route }}}">Добавить блок контента</span>
</fieldset>
