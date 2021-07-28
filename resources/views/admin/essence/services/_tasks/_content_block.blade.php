<li data-element-list="element" data-element-key="{{ $key }}" class="content-block-element {{{ (\Request::old("{$relation}.{$key}.full_info") == 1 || !$element->exists) ? 'show-full-info' : '' }}}">

    <div class="controls">
        <span class="btn btn-default btn-xs toggle-info toggle-full-info glyphicon glyphicon-menu-down"></span>
        <span class="btn btn-default btn-xs toggle-info toggle-short-info glyphicon glyphicon-menu-up"></span>
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("{$relation}[{$key}][full_info]", 0, ['data-full-info-state' => '']) }}
    {{ Form::hidden("{$relation}[{$key}][id]", $element->id) }}

    <div class="short-info">
        <div class="loaded-image image-thumb-wrapper">
            @if ($element->getAttachment('image')->exists())
                <a href="{{{ $element->getAttachment('image')->getRelativePath() }}}" target="_blank" rel="prettyPhoto">
                    <img src="{{{ $element->getAttachment('image')->getRelativePath('thumb') }}}" alt="" />
                </a>
            @else
                <img src="/images/common/no-image/no-image-100x100.png" alt="" />
            @endif
        </div>
    </div>

    <div class="full-info">
        {!! Form::tbFormGroupOpen("{$relation}.{$key}.image_file") !!}
            {{ Form::tbLabel("{$relation}[{$key}][image]", trans('validation.attributes.image_file')) }}
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



        {!!   Form::tbFormGroupOpen("{$relation}.{$key}.icon_file") !!}
            {{ Form::tbLabel("{$relation}[{$key}][icon]", trans('validation.attributes.icon_file')) }}
            @if ($element->getAttachment('icon')->exists())
                <div class="loaded-image">
                    <a href="{{{ $element->getAttachment('icon')->getRelativePath() }}}" target="_blank" rel="prettyPhoto">
                        <img src="{{{ $element->getAttachment('icon')->getRelativePath('thumb') }}}" alt="" />
                    </a>
                    <label>
                        {{ Form::checkbox("{$relation}[{$key}][icon_remove]", 1) }}
                        удалить
                    </label>
                </div>
            @endif
            <div class="file-upload-container">
                @include('admin.shared._local_or_remote_file_field', ['field' => "{$relation}[{$key}][icon_file]"])
            </div>
        {!! Form::tbFormGroupClose() !!}

    </div>

    <div class="full-info">
        {{ Form::tbLabel("{$relation}[{$key}][title]", trans('validation.attributes.title')) }}
        {{ Form::tbText("{$relation}[{$key}][title]", $element->title) }}
    </div>

    <div class="full-info">
        <div class="form-group">
            {{ Form::tbLabel("{$relation}[{$key}][text]", trans('validation.attributes.text')) }}
            {{ Form::tbTinymceTextarea("{$relation}[{$key}][text]", $element->text, ['rows' => 3]) }}
        </div>
    </div>

    <div class="full-info">
        {{ Form::tbLabel("{$relation}[{$key}][position]", trans('validation.attributes.position')) }}
        {{ Form::tbText("{$relation}[{$key}][position]", $element->position) }}
    </div>

</li>
