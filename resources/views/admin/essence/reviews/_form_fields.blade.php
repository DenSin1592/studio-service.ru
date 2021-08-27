
{!! Form::tbTextBlock('name') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}
<hr>
{!! Form::tbTextBlock('youtube_link', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://youtu.be/x_wfoY56JGc)']) !!}
<hr>


{{--<fieldset class="bordered-group">
    <legend>Блок изображений</legend>--}}
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image', 'description' => 'Рекомендуемый размер изображения - 668х451'])


{{--<fieldset class="bordered-group">
    <legend>Галерея</legend>

    @include('admin.shared._images._images', [
        'elements' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ImagesController::RELATIONS_NAME],
        'route' => route(\App\Http\Controllers\Admin\Relations\Reviews\ImagesController::ROUTE_CREATE),
        'relation' => \App\Http\Controllers\Admin\Relations\Reviews\ImagesController::RELATIONS_NAME,
    ])
</fieldset>--}}
<hr>
{!! Form::tbTextareaBlock('text', trans('validation.attributes.review_content')) !!}
<hr>
@include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATIONS_NAME]]
    )
)
<hr>

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
