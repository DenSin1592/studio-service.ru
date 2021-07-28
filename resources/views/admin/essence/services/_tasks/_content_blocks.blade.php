<fieldset class="bordered-group">
    <legend>Блок "Задачи, которые решает"</legend>

    <ul class="grouped-field-list content-block-list" data-element-list="container" id="tasks-list">
        @foreach ($elements as $key => $elem)
            @include('admin.essence.services._tasks._content_block')
        @endforeach
    </ul>

    <span class="btn btn-default btn-xs grouped-field-list-add"
          data-element-list="add"
          data-element-list-target="#tasks-list"
          data-load-element-url="{{{ $route }}}">Добавить блок содержимого</span>
</fieldset>
