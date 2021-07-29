
{!! Form::tbTextBlock('name') !!}

{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}

{!! Form::tbTextBlock('youtube_link', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://youtu.be/FQwz5Qfxf_o)']) !!}

{!! Form::tbTinymceTextareaBlock('text', trans('validation.attributes.review_content')) !!}


<fieldset class="bordered-group">
    <legend>Галерея</legend>
    <p>
        <i>Первое фото выводиться на превью</i>
    </p>
    @include('admin.shared._images._images', [
        'elements' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ImagesController::RELATIONS_NAME],
        'route' => route(\App\Http\Controllers\Admin\Relations\Reviews\ImagesController::ROUTE_CREATE),
        'relation' => \App\Http\Controllers\Admin\Relations\Reviews\ImagesController::RELATIONS_NAME,
    ])
</fieldset>


@include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATIONS_NAME]]
    )
)

{!!  Form::tbFormGroupOpen('review_date') !!}
    {!! Form::tbLabel('review_date', trans('validation.attributes.review_date')) !!}
    {!! Form::tbText(
        'review_date',
        !empty($formData[$essenceName]->review_date) ? date( "d.m.Y H:i:s" , strtotime($formData[$essenceName]->review_date)) : '',
        ['data-datetimepicker' => json_encode(['format' => "d.m.Y H:i:s"])]
    )
    !!}

{!! Form::tbFormGroupClose() !!}

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
