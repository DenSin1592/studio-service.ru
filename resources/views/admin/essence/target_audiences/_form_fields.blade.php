
{!! Form::tbFormGroupOpen('parent_id') !!}
    {!! Form::tbLabel('parent_id', trans('validation.attributes.parent_id')) !!}
    {!! Form::tbSelect('parent_id', $formData['parent_variants']) !!}
{!! Form::tbFormGroupClose() !!}
<hr>
{!! Form::tbTextBlock('name') !!}
{!! Form::tbTextBlock('alias') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}
<hr>
{!! Form::tbTextareaBlock('content_top', trans('validation.attributes.content_top')) !!}
<hr>

<fieldset class="bordered-group">
    <legend>Блок управления изображениями</legend>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'background_image', 'description' => 'Рекомендуемый размер изображения - 654х1363. Отображается в каталоге "ЦА" только для родительских ЦА.'])
    <hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'icon', 'description' => 'Рекомендуемый размер изображения - 50х50. Формат - svg' , 'format' => 'svg'])
</fieldset>
<hr>
@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
