@if(resolve('acl')->checkSeo())
    {!! Form::tbFormGroupOpen('header') !!}
        {!! Form::tbLabel('header', trans('validation.attributes.header')) !!}
        {!! Form::tbText('header') !!}
    {!! Form::tbFormGroupClose() !!}
@endif
