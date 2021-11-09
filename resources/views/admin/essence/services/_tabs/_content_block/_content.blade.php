
<li style="width: 100%;" data-element-list="element" data-element-key="{{ $key_two_level }}" class="content-block-element">

    <div class="controls">
        <span class="btn btn-warning btn-xs remove glyphicon glyphicon-remove" data-element-list="remove"></span>
    </div>

    {{ Form::hidden("{$relation}[{$key}][{$child_relation}][{$key_two_level}][id]", $element->id) }}

    {!! Form::tbTextBlock("{$relation}[{$key}][{$child_relation}][{$key_two_level}][name]", trans('validation.attributes.name'), $element->name) !!}

</li>

