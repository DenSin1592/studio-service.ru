@if(\Auth::guard('admin')->user()->super)
    <div class="device_type">
        @if(!empty($model->device_type))
            {{ trans('validation.model_values.device_type.' . $model->device_type) }}
        @else
            -
        @endif
    </div>
@endif