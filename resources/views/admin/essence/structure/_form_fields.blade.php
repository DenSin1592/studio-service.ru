{{-- Form fields for node --}}

{!! Form::tbFormGroupOpen('parent_id') !!}
    {!! Form::tbLabel('parent_id', trans('validation.attributes.parent_id')) !!}
    {!! Form::tbSelect2('parent_id', $parentVariants) !!}
{!! Form::tbFormGroupClose() !!}


{!! Form::tbFormGroupOpen('type') !!}
    {!! Form::tbLabel('type', trans('validation.attributes.type')) !!}
    <select id="type" name="type" class="form-control half" data-node-type>
        @foreach (TypeContainer::getEnabledTypeList($formData[$essenceName]->id) as $typeKey => $type)
            <option value="{{ $typeKey }}" data-home-page="{{ $typeKey === \App\Models\Node::TYPE_HOME_PAGE ? '1' : '' }}" {!! old('type', $formData[$essenceName]->type) == $typeKey ? 'selected="selected"' : '' !!}>{!! $type->getName() !!}</option>
        @endforeach
    </select>
{!! Form::tbFormGroupClose() !!}

{!! Form::tbFormGroupOpen('name') !!}
    {!! Form::tbLabel('name', trans('validation.attributes.name')) !!}
    {!! Form::tbText('name') !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbFormGroupOpen('alias') !!}
    {!! Form::tbLabel('alias', trans('validation.attributes.alias')) !!}
    {!! Form::tbText('alias') !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('menu_top') !!}
{!! Form::tbCheckboxBlock('menu_bottom') !!}

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
