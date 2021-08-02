
{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbTextBlock('youtube_link', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://youtu.be/FQwz5Qfxf_o)']) !!}

{!! Form::tbTinymceTextareaBlock('block_advantages', trans('validation.attributes.block_advantages')) !!}


<fieldset class="bordered-group">
    <legend>Предмет оффера</legend>
    <p>
        <em>Пересечение услуги и ЦА</em>
    </p>

    {!! Form::tbFormGroupOpen() !!}
    {!! Form::tbLabel('Услуга:') !!}
    <div class="field-hint-block">Для поиска услуги введите её название</div>

    @include('admin.shared._relations._belongs_to._block',
        [
            'relationName' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME,
            'routeSearch' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SEARCH,
            'routeEdit' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_EDIT,
            'routeShowOnSite' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SHOW_ON_SITE,
            ])

    {!! Form::tbFormGroupClose() !!}

    <div>TA</div>

</fieldset>


@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
