{!! Form::tbTextBlock('name') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}
{!! Form::tbTinymceTextareaBlock('description') !!}

<hr>

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_before', 'description' => 'Рекомендуемый размер изображения - 1145х435 px'])

<hr>

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_after', 'description' => 'Рекомендуемый размер изображения - 1145х435 px'])

<hr>

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
