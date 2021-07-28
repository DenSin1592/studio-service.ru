<li data-element-list="element" data-element-key="{{ $imageKey }}" class="short-info-image {{{ (\Request::old("images.{$imageKey}.full_info") == 1 || !$image->exists) ? 'show-full-info' : '' }}}">
    <div class="controls">
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("images[{$imageKey}][full_info]", 0, ['data-full-info-state' => '']) }}
    {{ Form::hidden("images[{$imageKey}][id]", $image->id) }}

    <div class="short-info form-group">
        <div class="loaded-image image-thumb-wrapper">
            @if ($image->getAttachment('image')->exists())
                <a href="{{{ $image->getAttachment('image')->getRelativePath() }}}" target="_blank" data-fancybox>
                    <img src="{{{ $image->getAttachment('image')->getRelativePath('thumb') }}}" alt=""/>
                </a>
            @else
                <img src="/images/common/no-image/no-image-100x100.png" alt=""/>
            @endif
        </div>
    </div>

    <div class="full-info">
        {!! Form::tbFormGroupOpen("images.{$imageKey}.image_file")  !!}
            {{ Form::tbLabel("images[{$imageKey}][image]", trans('validation.attributes.image_file')) }}
            @if ($image->getAttachment('image')->exists())
                <div class="loaded-image">
                    <a href="{{{ $image->getAttachment('image')->getRelativePath() }}}" target="_blank"
                       rel="prettyPhoto">
                        <img src="{{{ $image->getAttachment('image')->getRelativePath('thumb') }}}"/>
                    </a>
                </div>
            @endif
            <div class="file-upload-container">
                @include('admin.shared._file_field', ['field' => "images[{$imageKey}][image_file]"])
            </div>
        {!! Form::tbFormGroupClose() !!}
    </div>

    <div class="full-info">
        {{ Form::tbLabel("images[{$imageKey}][position]", trans('validation.attributes.position')) }}
        {{ Form::tbText("images[{$imageKey}][position]", $image->position) }}
    </div>

    <div class="full-info">
        {!! Form::tbCheckboxBlock("images[{$imageKey}][publish]", trans('validation.attributes.publish'), $image->publish) !!}
    </div>

<div class="controls">
<span class="btn btn-default btn-xs toggle-info toggle-full-info glyphicon glyphicon-menu-down"><span>Развернуть</span></span>
<span class="btn btn-default btn-xs toggle-info toggle-short-info glyphicon glyphicon-menu-up"><span>Свернуть</span></span>
</div>
</li>
