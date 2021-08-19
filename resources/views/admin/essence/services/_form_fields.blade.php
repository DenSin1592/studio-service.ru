{!! Form::tbTextBlock('name') !!}
{!! Form::tbTextBlock('alias') !!}
{!! Form::tbCheckboxBlock('publish') !!}
{!! Form::tbCheckboxBlock('on_home_page') !!}
<hr>


@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image', 'description' => 'Рекомендуемый размер изображения - 380х293'])
<hr>


<fieldset class="bordered-group">
    <legend>Блок-заголовок</legend>
    {!! Form::tbFormGroupOpen('header') !!}
    {!! Form::tbLabel('header', trans('validation.attributes.header')) !!}
    <div class="field-hint-block">Если заголовок не заполнен - выводиться название</div>
    {!! Form::tbText('header') !!}
    {!! Form::tbFormGroupClose() !!}
    <hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'header_block_background_image','description' => 'Рекомендуемый размер изображения - 1920х900'])
    <hr>
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'image_right_from_header','description' => 'Рекомендуемый размер изображения - 664х558'])
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
    @include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'section_video_image','description' => 'Рекомендуемый размер изображения - 949х394'])

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


<fieldset class="bordered-group">
    <legend>Управление блоком с требованиями</legend>
    {!! Form::tbTextBlock('section_requirements_name') !!}
    {!! Form::tbTinymceTextareaBlock('section_requirements_content') !!}
    {!! Form::tbCheckboxBlock('section_requirements_publish') !!}
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком FAQ</legend>
    {!! Form::tbTextBlock('section_faq_name') !!}
    {!! Form::tbCheckboxBlock('section_faq_publish') !!}
    <hr>
    @include('admin.essence.services._faq_questions._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Services\FaqQuestionsController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Services\FaqQuestionsController::RELATIONS_NAME,
    ])
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком цен</legend>
    {!! Form::tbTextBlock('section_prices_name') !!}
    {!! Form::tbTinymceTextareaBlock('section_prices_content') !!}
    {!! Form::tbCheckboxBlock('section_prices_publish') !!}
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком преимуществ</legend>
    {!! Form::tbTinymceTextareaBlock('section_advantages_content') !!}
    {!! Form::tbCheckboxBlock('section_advantages_publish') !!}
    <hr>
    @include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Services\BeforeAfterImagesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Services\BeforeAfterImagesController::RELATIONS_NAME]
    ]))
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком обратной связи</legend>
    {!! Form::tbTextBlock('section_feedback_name') !!}
    {{--{!! Form::tbCheckboxBlock('section_feedback_publish') !!}--}}
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком компетенций</legend>
    {!! Form::tbTextBlock('section_competencies_name') !!}
    {!! Form::tbCheckboxBlock('section_competencies_publish') !!}
    <hr>
    @include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Services\CompetenciesController::RELATIONS_NAME]
    ]))
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком 'Другие услуги'</legend>
    {!! Form::tbTextBlock('section_services_name') !!}
    {!! Form::tbCheckboxBlock('section_services_publish') !!}
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком ЦА</legend>
    {!! Form::tbTextBlock('section_target_audiences_name') !!}
    {!! Form::tbCheckboxBlock('section_target_audiences_publish') !!}
    <hr>
    @include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Services\TargetAudiencesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Services\TargetAudiencesController::RELATIONS_NAME]
    ]))
</fieldset>
<hr>


{!! Form::tbCheckboxBlock('section_reviews_publish') !!}
{!! Form::tbCheckboxBlock('section_projects_publish') !!}


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
