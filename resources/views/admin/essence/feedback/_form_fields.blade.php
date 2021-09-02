{!! Form::tbFormGroupOpen('id') !!}
    <strong>{!! trans('validation.attributes.id') !!}</strong>: {!! $formData[$essenceName]->id !!}
{!! Form::tbFormGroupClose() !!}

{!! Form::tbTextBlock('name', 'Имя') !!}
@include('admin.shared._form_header')
{!! Form::tbTextBlock('email') !!}

{!! Form::tbTextBlock('phone', null, null, ['data-phone' => true, 'data-client-phone-mask']) !!}

@include('admin.shared._referral_url_field', ['model' => $formData[$essenceName]])

@include('admin.shared.device_type._form_field', ['model' => $formData[$essenceName]])


{!! Form::tbFormGroupOpen("file_project_file") !!}
    {{ Form::label("file_project_file", 'Файл проекта')}}
        @if (!is_null($formData[$essenceName]->file_project))
            <div class="loaded-image">
                <a href="{{{ $formData[$essenceName]->getAttachment('file_project')->getRelativePath() }}}" target="_blank" data-fancybox="">
                    {{$formData[$essenceName]->file_project}}
                </a>
                <label>
                    {!! Form::checkbox("file_project_remove", 1) !!} удалить
                </label>
            </div>
        @endif

        <div class="file-upload-container">
            {!! Form::file("file_project_file") !!}
        </div>
{!! Form::tbFormGroupClose() !!}


{!! Form::tbSelectBlock('status', \App\Models\Feedback::STATUS_LIST) !!}

{!! Form::tbTextareaBlock('admin_comment') !!}

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])


