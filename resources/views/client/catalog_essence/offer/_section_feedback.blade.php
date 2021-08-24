<section id="section-feedback" class="section-feedback section-purple-light">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="feedback-block">
                    <div class="feedback-title title-h1">{{$model->section_feedback_name}}</div>

                        <form action="{{ route('feedback') }}"
                              id="form-feedback"
                              class="form-feedback"
                              method="POST"
                              novalidate
                              enctype="multipart/form-data"
                        >
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Имя">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <input type="tel" name="phone" data-client-phone-mask class="form-control" placeholder="Телефон*">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-12 col-xl-3">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file_project_file" id="feedback-file-field" aria-describedby="feedback-file-field">
                                        <label class="custom-file-label" for="feedback-file-field">Прикрепить проект</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="privacy" id="feedback-privacy-field" checked="" required="">
                                        <label for="feedback-privacy-field" class="custom-control-label">Я ознакомлен и согласен с <a href="{{ route('privacy') }}">Политикой конфиденциальности</a></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-lg btn-primary" data-target="section-feedback">
                                    <svg class="btn-icon" width="31" height="22">
                                        <use xlink:href="{{asset('/images/icons/sprite.svg#icon-arrow-to-right')}}"></use>
                                    </svg>
                                    Отправить заявку
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
