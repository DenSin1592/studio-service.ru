
{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbTextBlock('youtube_link', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://youtu.be/FQwz5Qfxf_o)']) !!}

{!! Form::tbTinymceTextareaBlock('block_advantages', trans('validation.attributes.block_advantages')) !!}


<fieldset class="bordered-group">
    <legend>Предмет оффера</legend>
    <p>
        <i>Пересечение услуги и ЦА</i>
    </p>

    {!! Form::tbFormGroupOpen() !!}
    {!! Form::tbLabel('Услуга:') !!}
    <div class="field-hint-block">Для поиска услуги введите её название</div>

    {!! Form::tbSelect(\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME . '_id',
    (!empty($formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]) ? [$formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]->id => $formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]->name . ' [id = ' . $formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]->id . ']'] : []),
    null,
    [
        'data-search-url' => route(\App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SEARCH),
        'style' => 'display: inline-block',
        'data-edit-url-name' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_EDIT,
        'data-show_on-site-url-name' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SHOW_ON_SITE,
    ]) !!}

    <div id="model-edit-links" {!! !isset($formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]) ? 'style="display: none"' : '' !!}>

        <a data-edit-link
           href="{!! isset($formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]) ? route(\App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_EDIT, $formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]->id) : '#' !!}"
           target="_blank"
           title="Редактировать модель"
           class="glyphicon glyphicon-share">
        </a>

        <a data-site-link
           href="{!! (isset($formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]) && $formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]->publish) ? route(\App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SHOW_ON_SITE, $formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]->alias) : '#' !!}"
           @if (!(isset($formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]) && $formData[\App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME]->publish))
           style="display: none"
           @endif
           target="_blank"
           title="Смотреть на сайте"
           class="glyphicon glyphicon-share-alt">
        </a>

    </div>

    {!! Form::tbFormGroupClose() !!}

    <div>TA</div>

</fieldset>


@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
