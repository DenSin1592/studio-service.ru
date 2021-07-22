<fieldset class="bordered-group">
    <legend>Галерея</legend>

    <ul class="grouped-field-list" data-element-list="container" id="photos-elements">
        @foreach ($images as $imageKey => $image)

            @include('admin.shared._images._image')
        @endforeach
    </ul>

    <span class="btn btn-default btn-xs grouped-field-list-add"
          data-element-list="add"
          data-element-list-target="#photos-elements"
          data-load-element-url="{{{ $route }}}">Добавить изображение</span>
</fieldset>
