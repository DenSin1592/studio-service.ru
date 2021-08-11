{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbTextBlock('youtube_link', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://youtu.be/o_l4Ab5FRwM)']) !!}

{!! Form::tbTinymceTextareaBlock('block_advantages', trans('validation.attributes.block_advantages')) !!}

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image'])

<fieldset class="bordered-group">
    <legend>Предмет оффера</legend>
    <p>
        <em>Пересечение Услуги и ЦА</em>
    </p>

    {!! Form::tbFormGroupOpen(\App\Http\Controllers\Admin\Relations\Offers\ServicesController::FIELD_NAME) !!}

    {!! Form::tbLabel('Услуга:') !!}
    <div class="field-hint-block">Для поиска услуги введите её название</div>

    @include('admin.shared._relations._belongs_to._block',
        [
            'relationName' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME,
            'fieldName' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::FIELD_NAME,
            'routeSearch' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SEARCH,
            'routeEdit' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_EDIT,
            'routeShowOnSite' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SHOW_ON_SITE,
            ])
    {!! Form::tbFormGroupClose() !!}

    <hr/>

    {!! Form::tbFormGroupOpen(\App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::FIELD_NAME) !!}

    {!! Form::tbLabel('Целевая аудитория:') !!}
    <div class="field-hint-block">Для поиска ЦА введите её название</div>
    @include('admin.shared._relations._belongs_to._block',
        [
            'relationName' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::RELATIONS_NAME,
            'fieldName' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::FIELD_NAME,
            'routeSearch' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::ROUTE_SEARCH,
            'routeEdit' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::ROUTE_EDIT,
            'routeShowOnSite' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::ROUTE_SHOW_ON_SITE,
            ])
    {!! Form::tbFormGroupClose() !!}
</fieldset>


@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
