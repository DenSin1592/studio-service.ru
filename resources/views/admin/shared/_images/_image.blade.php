<li data-element-list="element" data-element-key="{{ $key }}" class="short-info-image {{{ (\Request::old("{$relation}.{$key}.full_info") == 1 || !$element->exists) ? 'show-full-info' : '' }}}">
    <div class="controls">
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("{$relation}[{$key}][full_info]", 0, ['data-full-info-state' => '']) }}
    {{ Form::hidden("{$relation}[{$key}][id]", $element->id) }}

    <div class="short-info form-group">
        <div class="loaded-image image-thumb-wrapper">
            @if ($element->getAttachment('image')->exists())
                <a href="{{{ $element->getAttachment('image')->getRelativePath() }}}" target="_blank" data-fancybox>
                    <img src="{{{ $element->getAttachment('image')->getRelativePath('thumb') }}}" alt=""/>
                </a>
            @else
                <img src="/images/common/no-image/no-image-100x100.png" alt=""/>
            @endif
        </div>
    </div>

    <div class="full-info">
        {!! Form::tbFormGroupOpen("{$relation}.{$key}.image_file")  !!}
            {{ Form::tbLabel("{$relation}[{$key}][image]", trans('validation.attributes.image_file')) }}
            @if ($element->getAttachment('image')->exists())
                <div class="loaded-image">
                    <a href="{{{ $element->getAttachment('image')->getRelativePath() }}}" target="_blank"
                       rel="prettyPhoto">
                        <img src="{{{ $element->getAttachment('image')->getRelativePath('thumb') }}}"/>
                    </a>
                </div>
            @endif
            <div class="file-upload-container">
                @include('admin.shared._file_field', ['field' => "{$relation}[{$key}][image_file]"])
            </div>
        {!! Form::tbFormGroupClose() !!}
    </div>

    <div class="full-info">
        {{ Form::tbLabel("{$relation}[{$key}][position]", trans('validation.attributes.position')) }}
        {{ Form::tbText("{$relation}[{$key}][position]", $element->position) }}
    </div>

    <div class="full-info">
        {!! Form::tbCheckboxBlock("{$relation}[{$key}][publish]", trans('validation.attributes.publish'), $element->publish) !!}
    </div>

<div class="controls">
<span class="btn btn-default btn-xs toggle-info toggle-full-info glyphicon glyphicon-menu-down"><span>Развернуть</span></span>
<span class="btn btn-default btn-xs toggle-info toggle-short-info glyphicon glyphicon-menu-up"><span>Свернуть</span></span>
</div>
</li>
