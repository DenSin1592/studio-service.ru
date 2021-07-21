<ol>
    @foreach ($models as $key => $model)
        <li data-element-container="element">
            <input data-element="id" type="hidden" name="{{$relationsName}}[{{{ $key }}}][id]" value="{{{ $model->id }}}" />
            <a data-element="name" href="{{{route($routeEdit, [$model->id]) }}}" target="_blank">
                {{{ $model->name }}}
            </a>
        </li>
    @endforeach
</ol>
