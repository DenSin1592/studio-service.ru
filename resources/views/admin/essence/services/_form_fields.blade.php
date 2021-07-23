
{!! Form::tbFormGroupOpen('name') !!}
    {!! Form::tbLabel('name', trans('validation.attributes.name')) !!}
    {!! Form::tbText('name') !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbFormGroupOpen('alias') !!}
    {!! Form::tbLabel('alias', trans('validation.attributes.alias')) !!}
    {!! Form::tbText('alias') !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbCheckboxBlock('publish') !!}

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image'])

@include('admin.shared._relations._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATIONS_NAME]]
    )
)
@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
