<li style="width: 100%;" data-element-list="element" data-element-key="{{ $key }}" class="content-block-element {{{ (\Request::old("{$relation}.{$key}.full_info") == 1 || !$element->exists) ? 'show-full-info' : '' }}}">

    <div class="controls">
        <span class="btn btn-default btn-xs toggle-info toggle-full-info glyphicon glyphicon-menu-down"></span>
        <span class="btn btn-default btn-xs toggle-info toggle-short-info glyphicon glyphicon-menu-up"></span>
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("{$relation}[{$key}][full_info]", 0, ['data-full-info-state' => '']) }}
    {{ Form::hidden("{$relation}[{$key}][id]", $element->id) }}

    <div class="short-info">
            {!! Form::tbTextBlock("{$relation}[{$key}][name]", trans('validation.attributes.name'), $element->name, ['disabled' => true]) !!}
    </div>


    <div class="full-info">
        <div class="form-group">
            {!! Form::tbTextBlock("{$relation}[{$key}][name]", trans('validation.attributes.name'), $element->name) !!}
        </div>
    </div>
    <div class="full-info">
        <div class="form-group">
            {{ Form::tbLabel("{$relation}[{$key}][content]", trans('validation.attributes.content')) }}
            {{ Form::tbTextarea("{$relation}[{$key}][content]", $element->content, ['rows' => 3]) }}
        </div>
    </div>

    <div class="full-info">

    {!! Form::tbFormGroupOpen("{$relation}.{$key}.image_file") !!}
    {{ Form::tbLabel("{$relation}[{$key}][image]", trans('validation.attributes.image_file')) }}
        <div class="field-hint-block">Рекомендуемый размер изображения - 558х383</div>
    @if ($element->getAttachment('image')->exists())
        <div class="loaded-image">
            <a href="{{{ $element->getAttachment('image')->getRelativePath() }}}" target="_blank" rel="prettyPhoto">
                <img src="{{{ $element->getAttachment('image')->getRelativePath('thumb') }}}" alt="" />
            </a>
            <label>
                {{ Form::checkbox("{$relation}[{$key}][image_remove]", 1) }}
                удалить
            </label>
        </div>
    @endif
    <div class="file-upload-container">
        @include('admin.shared._local_or_remote_file_field', ['field' => "{$relation}[{$key}][image_file]"])
    </div>
    {!!  Form::tbFormGroupClose() !!}

        {!! Form::tbCheckboxBlock("{$relation}[{$key}][image_right]", trans('validation.attributes.image_right'), $element->image_right) !!}
        {!! Form::tbCheckboxBlock("{$relation}[{$key}][publish]", trans('validation.attributes.publish'), $element->publish) !!}

        {{ Form::tbLabel("{$relation}[{$key}][position]", trans('validation.attributes.position')) }}
        {{ Form::tbText("{$relation}[{$key}][position]", $element->position) }}
    </div>

</li>
