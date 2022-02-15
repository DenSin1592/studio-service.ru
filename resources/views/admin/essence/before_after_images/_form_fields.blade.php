{!! Form::tbTextBlock('name') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}
{!! Form::tbTinymceTextareaBlock('description') !!}

<hr>

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_before', 'description' => 'Рекомендуемый размер изображения - 1145х435 px'])

<hr>

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_after', 'description' => 'Рекомендуемый размер изображения - 1145х435 px'])

<hr>

@if($formData[$essenceName]->exists)
    <div class="form-group">
        <label for="" class="control-label">Код</label>
        <textarea class="form-control" cols="50" rows="10" disabled>{!!
'<div class="gallery-header-container d-flex flex-column justify-content-center">
    <div class="gallery-description">'. $formData[$essenceName]->description .'</div>
</div>

<div class="twentytwenty-cover">
    <div class="twentytwenty-block">
        <img src="'.$formData[$essenceName]->getImgPath('image_before', 'main').'" class="twentytwenty-media" alt="">
        <img src="'.$formData[$essenceName]->getImgPath('image_after', 'main').'" class="twentytwenty-media" alt="">
    </div>
</div>'
!!}</textarea>
    </div>
@endif

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
