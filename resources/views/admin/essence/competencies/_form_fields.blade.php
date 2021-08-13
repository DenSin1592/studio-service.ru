{!! Form::tbTextBlock('name') !!}
{!! Form::tbTextBlock('alias') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}

<hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image', 'description' => 'Размер изображения - 334х424'])
{!! Form::tbCheckboxBlock('black_header_preview') !!}
<hr>

{!! Form::tbTextareaBlock('description') !!}

<hr>

@include('admin.essence.competencies._content_blocks._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Competencies\ContentBlocksController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Competencies\ContentBlocksController::RELATIONS_NAME,
    ])

<hr>

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
