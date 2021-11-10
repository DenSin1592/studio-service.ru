
<li style="width: 100%;" data-element-list="element" data-element-key="{{ $key_two_level }}" class="content-block-element">

    <div class="controls">
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("{$relation}[{$key}][{$child_relation}][{$key_two_level}][id]", $element->id) }}


        {!! Form::tbTextBlock("{$relation}[{$key}][{$child_relation}][{$key_two_level}][name]", trans('validation.attributes.name'), $element->name) !!}
        {!! Form::tbTextareaBlock("{$relation}[{$key}][{$child_relation}][{$key_two_level}][description]", trans('validation.attributes.description'), $element->description) !!}

        {!! Form::tbCheckboxBlock("{$relation}[{$key}][{$child_relation}][{$key_two_level}][publish]", trans('validation.attributes.publish'), $element->publish) !!}
        {!! Form::tbCheckboxBlock("{$relation}[{$key}][{$child_relation}][{$key_two_level}][white_text]", trans('validation.attributes.white_text'), $element->white_text) !!}

        {!! Form::tbTextBlock("{$relation}[{$key}][{$child_relation}][{$key_two_level}][position]", trans('validation.attributes.position'), $element->position) !!}
        {!! Form::tbTextBlock("{$relation}[{$key}][{$child_relation}][{$key_two_level}][link]", trans('validation.attributes.url'), $element->link) !!}

        {!! Form::tbFormGroupOpen("{$relation}[{$key}][{$child_relation}][{$key_two_level}].image_file") !!}
        {{ Form::tbLabel("{$relation}[{$key}][{$child_relation}][{$key_two_level}][image]", trans('validation.attributes.image_file')) }}
        <div class="field-hint-block">Рекомендуемый размер изображения - 700х604 px</div>
        @if ($element->getAttachment('image')->exists())
            <div class="loaded-image">
                <a href="{{{ $element->getAttachment('image')->getRelativePath() }}}" target="_blank" rel="prettyPhoto">
                    <img src="{{{ $element->getAttachment('image')->getRelativePath('thumb') }}}" alt="" />
                </a>
                <label>
                    {{ Form::checkbox("{$relation}[{$key}][{$child_relation}][{$key_two_level}][image_remove]", 1) }}
                    удалить
                </label>
            </div>
        @endif
        <div class="file-upload-container">
            @include('admin.shared._local_or_remote_file_field', ['field' => "{$relation}[{$key}][{$child_relation}][{$key_two_level}][image_file]"])
        </div>
        {!!  Form::tbFormGroupClose() !!}


</li>

