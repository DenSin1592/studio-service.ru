
{!! Form::tbTextBlock('name') !!}

{!! Form::tbTextBlock('alias') !!}

{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image'])

@include('admin.shared._relations._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATIONS_NAME]
    ]))

    @include('admin.essence.services._tasks._content_blocks',[
    'elements' => $formData[\App\Http\Controllers\Admin\Relations\Services\TasksController::RELATIONS_NAME],
    'route' => route(\App\Http\Controllers\Admin\Relations\Services\TasksController::ROUTE_CREATE),
    ])

@include('admin.shared._form_meta_fields')

@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
