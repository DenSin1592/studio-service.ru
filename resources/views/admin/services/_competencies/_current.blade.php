<ol>
    @foreach ($models as $key => $model)
        <li data-element-container="element">
            <input data-element="id" type="hidden" name="competencies[{{{ $key }}}][id]" value="{{{ $model->id }}}" />
            <a data-element="name" href="{{{route(\App\Http\Controllers\Admin\CompetenciesController::ROUTE_EDIT, [$model->id]) }}}" target="_blank">
                {{{ $model->name }}}
            </a>
        </li>
    @endforeach
</ol>
