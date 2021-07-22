
{!! Form::tbTextBlock('name') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbTinymceTextareaBlock('text', trans('validation.attributes.review_content')) !!}

@include('admin.shared._images._images', [
    'images' => $formData[\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::RELATIONS_NAME],
    'route' => route(\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::ROUTE_CREATE)
    ])

@include('admin.shared._relations._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATIONS_NAME]]
    )
)

@include('admin.shared._model_timestamps', ['model' => $formData[App\Services\DataProviders\OurWorkForm\OurWorkForm::MODEL_KEY]])
