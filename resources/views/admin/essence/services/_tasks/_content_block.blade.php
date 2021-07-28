<li data-element-list="element" data-element-key="{{ $key }}" class="content-block-element {{{ (\Request::old("tasks.{$key}.full_info") == 1 || !$elem->exists) ? 'show-full-info' : '' }}}">

    <div class="controls">
        <span class="btn btn-default btn-xs toggle-info toggle-full-info glyphicon glyphicon-menu-down"></span>
        <span class="btn btn-default btn-xs toggle-info toggle-short-info glyphicon glyphicon-menu-up"></span>
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("tasks[{$key}][full_info]", 0, ['data-full-info-state' => '']) }}
    {{ Form::hidden("tasks[{$key}][id]", $elem->id) }}

    <div class="short-info">
        <div class="loaded-image image-thumb-wrapper">
            @if ($elem->getAttachment('image')->exists())
                <a href="{{{ $elem->getAttachment('image')->getRelativePath() }}}" target="_blank" rel="prettyPhoto">
                    <img src="{{{ $elem->getAttachment('image')->getRelativePath('thumb') }}}" alt="" />
                </a>
            @else
                <img src="/images/common/no-image/no-image-100x100.png" alt="" />
            @endif
        </div>
    </div>

    <div class="full-info">
        {!! Form::tbFormGroupOpen("tasks.{$key}.image_file") !!}
            {{ Form::tbLabel("tasks[{$key}][image]", trans('validation.attributes.image_file')) }}
            @if ($elem->getAttachment('image')->exists())
                <div class="loaded-image">
                    <a href="{{{ $elem->getAttachment('image')->getRelativePath() }}}" target="_blank" rel="prettyPhoto">
                        <img src="{{{ $elem->getAttachment('image')->getRelativePath('thumb') }}}" alt="" />
                    </a>
                    <label>
                        {{ Form::checkbox("tasks[{$key}][image_remove]", 1) }}
                        удалить
                    </label>
                </div>
            @endif
            <div class="file-upload-container">
                @include('admin.shared._local_or_remote_file_field', ['field' => "tasks[{$key}][image_file]"])
            </div>
        {!!  Form::tbFormGroupClose() !!}



        {!!   Form::tbFormGroupOpen("tasks.{$key}.icon_file") !!}
            {{ Form::tbLabel("tasks[{$key}][icon]", trans('validation.attributes.icon_file')) }}
            @if ($elem->getAttachment('icon')->exists())
                <div class="loaded-image">
                    <a href="{{{ $elem->getAttachment('icon')->getRelativePath() }}}" target="_blank" rel="prettyPhoto">
                        <img src="{{{ $elem->getAttachment('icon')->getRelativePath('thumb') }}}" alt="" />
                    </a>
                    <label>
                        {{ Form::checkbox("tasks[{$key}][icon_remove]", 1) }}
                        удалить
                    </label>
                </div>
            @endif
            <div class="file-upload-container">
                @include('admin.shared._local_or_remote_file_field', ['field' => "tasks[{$key}][icon_file]"])
            </div>
        {!! Form::tbFormGroupClose() !!}

    </div>

    <div class="full-info">
        {{ Form::tbLabel("tasks[{$key}][title]", trans('validation.attributes.title')) }}
        {{ Form::tbText("tasks[{$key}][title]", $elem->title) }}
    </div>

    <div class="full-info">
        <div class="form-group">
            {{ Form::tbLabel("tasks[{$key}][text]", trans('validation.attributes.text')) }}
            {{ Form::tbTinymceTextarea("tasks[{$key}][text]", $elem->text, ['rows' => 3]) }}
        </div>
    </div>

    <div class="full-info">
        {{ Form::tbLabel("tasks[{$key}][position]", trans('validation.attributes.position')) }}
        {{ Form::tbText("tasks[{$key}][position]", $elem->position) }}
    </div>

</li>
