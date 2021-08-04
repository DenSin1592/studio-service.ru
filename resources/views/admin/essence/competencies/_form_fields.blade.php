
{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}


@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image'])

{!! Form::tbCheckboxBlock('black_header_preview') !!}

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
