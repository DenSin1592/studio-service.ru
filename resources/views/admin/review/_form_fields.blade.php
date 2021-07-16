
{!! Form::tbTextBlock('name') !!}

{!! Form::tbCheckboxBlock('publish') !!}

{!! Form::tbCheckboxBlock('on_home_page') !!}

{!! Form::tbTextBlock('email') !!}

{!! Form::tbTinymceTextareaBlock('text', trans('validation.attributes.review_content')) !!}

{!! Form::hidden('ip') !!}

{{--
@include('admin.review.form.images._images', ['images' => $formData['images']])
--}}

@include('admin.review._date_field', ['formData' => $formData])



@include('admin.shared._model_timestamps', ['model' => $formData['review']])
