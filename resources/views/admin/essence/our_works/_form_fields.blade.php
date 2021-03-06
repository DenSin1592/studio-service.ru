{!! Form::tbTextBlock('name') !!}
@include('admin.shared._form_header')
{!! Form::tbTextBlock('alias') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}

<hr>

<fieldset class="bordered-group">
    <legend>Блок изображений</legend>

    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image', 'description' => 'Рекомендуемый размер изображения - 960х719 px'])
    <hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'header_block_background_image', 'description' => 'Рекомендуемый размер изображения - 1939х532 px'])
</fieldset>

<hr>

{!! Form::tbTextareaBlock('preview', trans('validation.attributes.our_works_preview')) !!}
<hr>
{!! Form::tbTinymceTextareaBlock('content_before_slider', trans('validation.attributes.content_before_slider')) !!}
<hr>

<fieldset class="bordered-group">
    <legend>Галерея(слайдер)</legend>
    <p>
        <em>Размеры изображений - 1403х931</em>
    </p>
    @include('admin.shared._images._images', [
        'elements' => $formData[\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::RELATIONS_NAME],
        'route' => route(\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::ROUTE_CREATE),
        'relation' => \App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::RELATIONS_NAME,
    ])
</fieldset>

<hr>

{!! Form::tbTinymceTextareaBlock('content_after_slider', trans('validation.attributes.content_after_slider')) !!}

<hr>
@include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATIONS_NAME]]
    )
)

<hr>

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
