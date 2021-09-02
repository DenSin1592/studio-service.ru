{!! Form::tbTextBlock('name') !!}
{!! Form::tbTextBlock('alias') !!}
{!! Form::tbCheckboxBlock('publish') !!}

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image', 'description' => 'Размер изображения от 380х293'])


<fieldset class="bordered-group">
    <legend>Предмет оффера</legend>
    <p><em>Пересечение Услуги и ЦА.</em></p>
    <p><em>Если услуга или ЦА не опубликованы, оффер также не выводиться на сайте.</em></p>

    {!! Form::tbFormGroupOpen(\App\Http\Controllers\Admin\Relations\Offers\ServicesController::FIELD_NAME) !!}

    {!! Form::tbLabel('Услуга:') !!}
    <div class="field-hint-block">Для поиска услуги введите её название</div>

    @include('admin.shared._relations._belongs_to._block',
        [
            'relationName' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::RELATIONS_NAME,
            'fieldName' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::FIELD_NAME,
            'routeSearch' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SEARCH,
            'routeEdit' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_EDIT,
            'routeShowOnSite' => \App\Http\Controllers\Admin\Relations\Offers\ServicesController::ROUTE_SHOW_ON_SITE,
            'errorPublishMessage' => '(Не опубликованно! Оффер не будет выведен!)',
            ])
    {!! Form::tbFormGroupClose() !!}
    <hr/>

    {!! Form::tbFormGroupOpen(\App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::FIELD_NAME) !!}

    {!! Form::tbLabel('Целевая аудитория:') !!}
    <div class="field-hint-block">Для поиска ЦА введите её название</div>
    @include('admin.shared._relations._belongs_to._block',
        [
            'relationName' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::RELATIONS_NAME,
            'fieldName' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::FIELD_NAME,
            'routeSearch' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::ROUTE_SEARCH,
            'routeEdit' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::ROUTE_EDIT,
            'routeShowOnSite' => \App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController::ROUTE_SHOW_ON_SITE,
            'errorPublishMessage' => '(Не опубликованно! Оффер не будет выведен!)',
            ])
    {!! Form::tbFormGroupClose() !!}
</fieldset>
<hr/>


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


@include('admin.essence.offers._content_blocks._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Offers\ContentBlocksController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Offers\ContentBlocksController::RELATIONS_NAME,
    ])
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком задач</legend>

    {!! Form::tbTextBlock('section_tasks_name') !!}
    {!! Form::tbCheckboxBlock('section_tasks_publish') !!}

    @include('admin.essence.offers._tasks._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Offers\TasksController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Offers\TasksController::RELATIONS_NAME,
    ])
</fieldset>
<hr>

<fieldset class="bordered-group">
    <legend>Управление видео-блоком</legend>
    {!! Form::tbTextBlock('section_video_name') !!}
    {!! Form::tbTextBlock('section_video_link_youtube', null, null, ['hint' => 'Ссылка вида "поделиться"(например: https://www.youtube.com/watch?v=-452p_9ESbM&t=247s)']) !!}
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

    @include('admin.essence.offers._tabs._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Offers\TabsController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Offers\TabsController::RELATIONS_NAME,
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
    @include('admin.essence.offers._faq_questions._content_blocks',[
    'routeCreate' => route(\App\Http\Controllers\Admin\Relations\Offers\FaqQuestionsController::ROUTE_CREATE),
    'relation' => \App\Http\Controllers\Admin\Relations\Offers\FaqQuestionsController::RELATIONS_NAME,
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
    \App\Http\Controllers\Admin\Relations\Offers\BeforeAfterImagesController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Offers\BeforeAfterImagesController::RELATIONS_NAME]
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
    <p>
        <em>Набор компетенций происходит у услуги.</em>
    </p>
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком 'Другие офферы'</legend>
    {!! Form::tbTextBlock('section_offers_name') !!}
    {!! Form::tbCheckboxBlock('section_offers_publish') !!}
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком отзывов</legend>
    {!! Form::tbCheckboxBlock('section_reviews_publish') !!}
    <hr>
    @include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Offers\ReviewsController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Offers\ReviewsController::RELATIONS_NAME]
    ]))
</fieldset>
<hr>


<fieldset class="bordered-group">
    <legend>Управление блоком проектов</legend>
    {!! Form::tbCheckboxBlock('section_projects_publish') !!}
    <hr>
    @include('admin.shared._relations._many_to_many._block', array_merge(
    \App\Http\Controllers\Admin\Relations\Offers\ProjectsController::RELATION_BLOCK_VIEW_DEPENDENCIES(),
    ['models' => $formData[\App\Http\Controllers\Admin\Relations\Offers\ProjectsController::RELATIONS_NAME]
    ]))
</fieldset>
<hr>


@if(resolve('acl')->checkSeo())

    <fieldset class="bordered-group">
        <legend>Блок управления мета-данными</legend>

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
