
{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}



<fieldset class="bordered-group">
    <legend>Блок изображений</legend>
    <p>
        <em>Размер изображения от 350х450</em>
    </p>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image'])
</fieldset>

{!! Form::tbCheckboxBlock('black_header_preview') !!}

{!! Form::tbTinymceTextareaBlock('description') !!}

@include('admin.essence.competencies._content_blocks._content_blocks',[
    'elements' => $formData[\App\Http\Controllers\Admin\Relations\Competencies\ContentBlocksController::RELATIONS_NAME],
    'route' => route(\App\Http\Controllers\Admin\Relations\Competencies\ContentBlocksController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Competencies\ContentBlocksController::RELATIONS_NAME,
    ])

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
