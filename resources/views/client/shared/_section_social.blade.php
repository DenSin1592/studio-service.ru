<section class="section-social">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="social-grid row no-gutters">
                    <div class="social-item col-sm-6 d-flex">
                        <a {{Setting::get("site_content.wa_phone") ? 'href=https://wa.me/' . Setting::get("site_content.wa_phone") .' '. 'target="_blank"' :'href=javascript:void(0);'}} class="card-social card-social-whatsapp d-flex flex-column justify-content-center">
                            <div class="row align-items-center">
                                <div class="card-social-media-container col-auto">
                                    <div class="card-social-thumbnail">
                                        <img src="{{asset('images/icons/social/icon-logo-whatsapp.svg')}}" alt="WhatsApp" width="122" height="122" class="card-social-media">
                                    </div>
                                </div>

                                <div class="card-social-typography-container col">
                                    <div class="card-social-title">Свяжитесь с нами <br> по WhatsApp</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="social-item col-sm-6 d-flex">
                        <a {{Setting::get("site_content.telegram_phone") ? 'href=https://t.me/' . Setting::get("site_content.telegram_phone") .' '. 'target="_blank"' :'href=javascript:void(0);'}} class="card-social card-social-telegram d-flex flex-column justify-content-center">
                            <div class="row align-items-center">
                                <div class="card-social-media-container col-auto">
                                    <div class="card-social-thumbnail">
                                        <img src="{{asset('images/icons/social/icon-logo-telegram.svg')}}" alt="Telegram" width="124" height="124" class="card-social-media">
                                    </div>
                                </div>

                                <div class="card-social-typography-container col">
                                    <div class="card-social-title">Свяжитесь с нами <br> по Telegram</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
