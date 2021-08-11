{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbCheckboxBlock('on_home_page') !!}

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image'])

{!! Form::tbTinymceTextareaBlock('preview', trans('validation.attributes.our_works_preview')) !!}

{!! Form::tbTinymceTextareaBlock('content_before_slider', trans('validation.attributes.content_before_slider')) !!}

<fieldset class="bordered-group">
    <legend>Галерея(слайдер)</legend>
    <p>
        <em>Размеры изображений от 1400х900</em>
    </p>
    @include('admin.shared._images._images', [
        'elements' => $formData[\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::RELATIONS_NAME],
        'route' => route(\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::ROUTE_CREATE),
        'relation' => \App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::RELATIONS_NAME,
    ])
</fieldset>

{!! Form::tbTinymceTextareaBlock('content_after_slider', trans('validation.attributes.content_after_slider')) !!}

@include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATIONS_NAME]]
    )
)

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
