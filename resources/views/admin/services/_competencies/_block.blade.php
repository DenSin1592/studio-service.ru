<fieldset class="bordered-group">
    <legend>Компетенции</legend>

    <div class="field-hint-block">
        <p></p>
    </div>

    <div id="modal-competencies-current">
        @include('admin.services._competencies._current', ['models' => $formData['competencies']])
    </div>

    <div class="form-group">
        <button type="button" class="btn btn-success"
                data-source="#modal-competencies-current"
                data-toggle="modal" data-target="#modal-competencies-editor">
            Редактировать
        </button>
    </div>

    <div class="modal fade modal-associations-editor"
         data-modal-associations="editor"
         tabindex="-1" role="dialog" aria-hidden="true" id="modal-competencies-editor">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Выбор компеценций</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="editor-block-title">Доступные компетенции</div>
                            <div class="editor-elements-search">
                                <input class="form-control input-sm" type="text" placeholder="Поиск" data-editor-search="available" />
                            </div>
                            <div data-editor-wait="available">Подождите...</div>
                            <div class="editor-elements-container"
                                 data-editor-container="available"
                                 data-url="{{{ route('cc.services.competencies.available') }}}">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="editor-block-title">Выбранные компеценции</div>
                            <div class="editor-elements-search">
                                <input class="form-control input-sm" type="text" placeholder="Поиск" data-editor-search="current" />
                            </div>
                            <div class="editor-elements-container" data-editor-container="current" data-sortable="1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-primary"
                            data-editor-action="save"
                            data-url="{{{ route('cc.services.competencies.rebuild-current') }}}">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</fieldset>
