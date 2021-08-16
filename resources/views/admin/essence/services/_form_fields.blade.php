


{!! Form::tbTextBlock('name') !!}
{!! Form::tbTextBlock('alias') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}
<hr>


@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image', 'description' => 'Размер изображения - 380х293'])
<hr>


<fieldset class="bordered-group">
    <legend>Блок-заголовок</legend>
    {!! Form::tbFormGroupOpen('header') !!}
    {!! Form::tbLabel('header', trans('validation.attributes.header')) !!}
    <div class="field-hint-block">Если заголовок не заполнен - выводиться название</div>
    {!! Form::tbText('header') !!}
    {!! Form::tbFormGroupClose() !!}
    <hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'header_block_background_image','description' => 'Размер изображения - 1920х900'])
    <hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_right_from_header','description' => 'Размер изображения - 664х558'])
    <hr>
    {!! Form::tbTinymceTextareaBlock('achievements_block') !!}

</fieldset>

<hr>

@include('admin.essence.services._content_blocks._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Services\ContentBlocksController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Services\ContentBlocksController::RELATIONS_NAME,
    ])

<hr>
<fieldset class="bordered-group">
    <legend>Управление блоком задач</legend>

    {!! Form::tbTextBlock('section_tasks_name') !!}
    {!! Form::tbCheckboxBlock('section_tasks_publish') !!}

@include('admin.essence.services._tasks._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Services\TasksController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Services\TasksController::RELATIONS_NAME,
    ])
</fieldset>
<hr>
<fieldset class="bordered-group">
    <legend>Управление видео-блоком</legend>
    {!! Form::tbTextBlock('section_video_name') !!}
    {!! Form::tbTextBlock('section_video_link_youtube') !!}
    {!! Form::tbCheckboxBlock('section_video_publish') !!}
    <hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'section_video_image','description' => 'Размер изображения - 949х394'])

</fieldset>
<hr>

<fieldset class="bordered-group">
    <legend>Управление блоком с табами</legend>
    {!! Form::tbTextBlock('section_tabs_name') !!}
    {!! Form::tbTextareaBlock('section_tabs_description') !!}
    {!! Form::tbCheckboxBlock('section_tabs_publish') !!}

    @include('admin.essence.services._tabs._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Services\TabsController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Services\TabsController::RELATIONS_NAME,
    ])
</fieldset>
<hr>
@include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATIONS_NAME]
    ]))


@if(resolve('acl')->checkSeo())
    <hr>
    <fieldset class="bordered-group">
        <legend>Блок мета-данных</legend>

        {!! Form::tbFormGroupOpen('meta_title') !!}
        {!! Form::tbLabel('meta_title', trans('validation.attributes.meta_title')) !!}
        {!! Form::tbText('meta_title') !!}
        {!! Form::tbFormGroupClose() !!}

        {!! Form::tbFormGroupOpen('meta_description') !!}
        {!! Form::tbLabel('meta_description', trans('validation.attributes.meta_description')) !!}
        {!! Form::tbText('meta_description') !!}
        {!! Form::tbFormGroupClose() !!}

        {!! Form::tbFormGroupOpen('meta_keywords') !!}
        {!! Form::tbLabel('meta_keywords', trans('validation.attributes.meta_keywords')) !!}
        {!! Form::tbText('meta_keywords') !!}
        {!! Form::tbFormGroupClose() !!}

    </fieldset>
@endif


@include('admin.shared._model_timestamps', ['model' => $formData[$essenceName]])
