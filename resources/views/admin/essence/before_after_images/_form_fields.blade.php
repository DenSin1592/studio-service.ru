{!! Form::tbTextBlock('name') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}
{!! Form::tbTinymceTextareaBlock('description') !!}

<hr>

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_before', 'description' => 'Размер изображения - 1145х435'])

<hr>

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_after', 'description' => 'Размер изображения - 1145х435'])

<hr>

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])