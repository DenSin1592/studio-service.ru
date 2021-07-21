

{!! Form::tbFormGroupOpen('parent_id') !!}
    {!! Form::tbLabel('parent_id', trans('validation.attributes.parent_id')) !!}
    {!! Form::tbSelect2('parent_id', $parentVariants) !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbFormGroupOpen('name') !!}
    {!! Form::tbLabel('name', trans('validation.attributes.name')) !!}
    {!! Form::tbText('name') !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbFormGroupOpen('alias') !!}
    {!! Form::tbLabel('alias', trans('validation.attributes.alias')) !!}
    {!! Form::tbText('alias') !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbCheckboxBlock('publish') !!}

@include('admin.shared._model_image_field', ['model' => $formData[App\Services\DataProviders\TargetAudienceForm\TargetAudienceForm::MODEL_KEY], 'field' => 'icon'])

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[App\Services\DataProviders\TargetAudienceForm\TargetAudienceForm::MODEL_KEY]])
