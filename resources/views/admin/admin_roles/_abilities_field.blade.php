{!! Form::tbFormGroupOpen('abilities') !!}
    {!!  Form::tbLabel('abilities', trans('validation.attributes.abilities')) !!}
    <div class="available-resources">
        @foreach (array_chunk($abilities, 3, true) as $abilities_chunk)
            <div class="resource-chunk">
                @foreach ($abilities_chunk as $ability_key => $ability_name)
                    <div class="resource">
                        <label class="checkbox-inline">
                            <input name="abilities[]" value="{{{ $ability_key }}}"
                                   type="checkbox" {{ is_null($role->id) || in_array($ability_key, request()->old('abilities', $role->abilities)) ? 'checked="checked"' : '' }} />
                            {{{ $ability_name }}}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
{!! Form::tbFormGroupClose() !!}