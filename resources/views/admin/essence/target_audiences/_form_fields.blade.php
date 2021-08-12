
{!! Form::tbFormGroupOpen('parent_id') !!}
    {!! Form::tbLabel('parent_id', trans('validation.attributes.parent_id')) !!}
    {!! Form::tbSelect('parent_id', $formData['parent_variants']) !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}

<fieldset class="bordered-group">
    <legend>Блок изображений</legend>
    <p>
        <em>Размер изображения от 660х1400. Отображается в каталоге "ЦА" только для родительских ЦА.</em>
    </p>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'background_image'])
    <hr>
    <p>
        <em>Размер изображения от 50х50</em>
    </p>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'icon'])
</fieldset>


{!! Form::tbTinymceTextareaBlock('content_top', trans('validation.attributes.content_top')) !!}

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
