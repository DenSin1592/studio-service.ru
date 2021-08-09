
{!! Form::tbFormGroupOpen('parent_id') !!}
    {!! Form::tbLabel('parent_id', trans('validation.attributes.parent_id')) !!}
    {!! Form::tbSelect('parent_id', $formData['parent_variants']) !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'icon'])

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'background_image'])

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
