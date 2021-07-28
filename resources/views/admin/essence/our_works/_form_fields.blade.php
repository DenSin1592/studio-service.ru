
{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbCheckboxBlock('on_home_page') !!}

{!! Form::tbTinymceTextareaBlock('preview', trans('validation.attributes.our_works_preview')) !!}
{!! Form::tbTinymceTextareaBlock('description', trans('validation.attributes.our_works_description')) !!}

@include('admin.shared._images._images', [
    'elements' => $formData[\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::RELATIONS_NAME],
    'route' => route(\App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\OurWorks\ImagesController::RELATIONS_NAME
    ])

@include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Reviews\ServicesController::RELATIONS_NAME]]
    )
)

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
