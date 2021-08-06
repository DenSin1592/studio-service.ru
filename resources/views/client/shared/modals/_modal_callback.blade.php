<div class="modal fade" id="modalCallback" tabindex="-1" aria-labelledby="modalCallbackLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-lg-8 col-xxl-6 offset-sm-1 offset-lg-2 offset-xxl-3">
                        <div class="modal-header d-flex align-items-center">
                            <div class="modal-title title-h1" id="modalCallbackLabel">Отправить заявку</div>

                            <button type="button" class="modal-close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                                <svg aria-hidden="true" class="modal-close-media" width="40" height="40">
                                    <use xlink:href="{{asset('images/icons/sprite.svg#icon-close')}}"></use>
                                </svg>
                            </button>
                        </div>

                        <div class="modal-body">

                            <form action="{{ route('feedback') }}"
                                  id="form-feedback"
                                  class="form-modal"
                                  method="POST"
                                  novalidate
                                  enctype="multipart/form-data"
                            >
                                <div class="row">
                                    <div class="form-error"></div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Имя" >
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="tel" name="phone" class="form-control" placeholder="Телефон" >
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="E-mail" >
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" name="file_project_file" class="custom-file-input" id="modal-callback-file-field" aria-describedby="modal-callback-file-field">
                                                <label class="custom-file-label" for="modal-callback-file-field">Прикрепить проект</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="privacy" class="custom-control-input" id="modal-callback-privacy-field" checked>
                                                <label for="modal-callback-privacy-field" class="custom-control-label" >Я ознакомлен и согласен с <a href="{{route('privacy')}}">Политикой конфиденциальности</a></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-lg btn-primary" >
                                            <svg class="btn-icon" width="31" height="22">
                                                <use xlink:href="{{asset('images/icons/sprite.svg#icon-arrow-to-right')}}"></use>
                                            </svg>

                                            <span>Отправить заявку</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
