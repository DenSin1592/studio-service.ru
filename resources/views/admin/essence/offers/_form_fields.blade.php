{!! Form::tbTextBlock('name') !!}
{!! Form::tbTextBlock('alias') !!}
{!! Form::tbCheckboxBlock('publish') !!}

@include('admin.shared._model_image_field', ['model' => $formData[$essenceName], 'field' => 'preview_image', 'description' => 'Размер изображения от 380х293'])


<fieldset class="bordered-group">
    <legend>Предмет оффера</legend>
    <p>
        <em>Пересечение Услуги и ЦА</em>
    </p>

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

    <p>
        <em>Набор задач происходит у услуги.</em>
    </p>
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
