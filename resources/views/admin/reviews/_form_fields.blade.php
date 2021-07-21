
{!! Form::tbTextBlock('name') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbTextBlock('email') !!}

{!! Form::tbTinymceTextareaBlock('text', trans('validation.attributes.review_content')) !!}

@include('admin.reviews.form._images._images', ['images' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ImagesController::RELATIONS_NAME]])

@include('admin.shared._relations._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATIONS_NAME]]
    )
)

@include('admin.reviews._date_field', ['formData' => $formData])

@include('admin.shared._model_timestamps', ['model' => $formData['reviews']])
