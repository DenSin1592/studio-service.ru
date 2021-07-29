 <ul class="grouped-field-list" data-element-list="container" id="photos-elements">
        @foreach ($elements as $key => $element)
            @include('admin.shared._images._image')
        @endforeach
    </ul>

    <span class="btn btn-default btn-xs grouped-field-list-add"
          data-element-list="add"
          data-element-list-target="#photos-elements"
          data-load-element-url="{{{ $route }}}">Добавить изображение</span>

