@if (isset($model->referral_url) && !empty($model->referral_url))
    {!! Form::tbFormGroupOpen('referral_url') !!}
    <label>{{ trans('validation.model_values.feedback.referral_url') }}</label><br/>
    <a href="{{ $model->referral_url }}" target="_blank">
        {{ $model->referral_url }}
    </a>
    {!! Form::tbFormGroupClose() !!}
@endif
