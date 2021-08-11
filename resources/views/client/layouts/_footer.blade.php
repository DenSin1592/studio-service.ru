<footer class="footer-box flex-shrink-0 flex-grow-0">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="row">

                    @if(trim(Setting::get("site_content.phone")) !== '')
                        <div class="footer-contact-container col-6 col-sm-4 order-sm-0">
                            <div class="footer-subtitle">Телефон</div>

                            <div class="footer-contact-block">
                                <a href="tel:{{ Setting::get("site_content.phone") }}"
                                   class="footer-contact-link">{{ Setting::get("site_content.phone") }}</a>
                            </div>
                        </div>
                    @endif

                    @if(trim(Setting::get("mail.feedback.address")) !== '')
                        <div class="footer-contact-container col-6 col-sm-4 order-sm-1">
                            <div class="footer-subtitle">Почта</div>

                            <div class="footer-contact-block">
                                <a href="mailto:{{Setting::get("mail.feedback.address")}}"
                                   class="footer-contact-link">{{Setting::get("mail.feedback.address")}}</a>
                            </div>
                        </div>
                    @endif

                    <div class="footer-divider col-12 order-sm-3"></div>

                    <div class="footer-logo-container col-6 col-md-4 order-sm-4">
                        <a href="{{route('home')}}" class="footer-logo-block d-flex align-items-center">
                            <div class="footer-logo-thumbnail">
                                <img loading="lazy" src="{{asset('images/logo.svg')}}" width="70" height="65" alt=""
                                     class="footer-logo-media">
                            </div>

                            <div class="footer-logo-content">
                                <div class="footer-logo-title"><b>Студия-</b>Сервис</div>
                            </div>
                        </a>
                    </div>

                    <div
                        class="footer-social-container align-self-center align-self-md-start col-6 col-sm-4 col-md-3 col-lg-2 col-xl-3 order-sm-2 ml-auto">
                        <div class="footer-subtitle d-none d-md-block">Мессенджеры</div>

                        <div class="footer-social-block">
                            <ul class="footer-social-list list-unstyled d-flex flex-wrap justify-content-end justify-content-md-start">
                                <li class="footer-social-item">
                                    <a href="https://wa.me/+79160640600" class="footer-social-link" target="_blank">
                                        <img src="{{asset('images/icons/social/icon-social-telegram.svg')}}" width="40" height="40"
                                             alt="Telegram" class="footer-social-media">
                                    </a>
                                </li>

                                <li class="footer-social-item">
                                    <a href="https://wa.me/+79160640600" class="footer-social-link" target="_blank">
                                        <img src="{{asset('images/icons/social/icon-social-whatsapp.svg')}}" width="40" height="40"
                                             alt="Whatsapp" class="footer-social-media">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="footer-copyright-container col-12 col-md-5 order-sm-5">
                        <div class="footer-copyright-block">
                            <p>&copy;&nbsp;{{ date('Y') }} Студия-Сервис</p>
                            <p>Наша компания занимается подбором решений по организации комплексов для целевой аудитории
                                по направлениям: эфирное вещание, телевизионное производство, продакшн студии и
                                мультимедиа.</p>
                        </div>
                    </div>

                    <div class="footer-studio-container col-12 col-md-3 col-lg-2 col-xl-3 order-sm-6 ml-auto">
                        <a href="https://www.diol-it.ru/" class="footer-studio-block" target="_blank">
                            <div class="footer-studio-title">Разработка и продвижение</div>
                            <div class="footer-studio-thumbnail">
                                <img src="{{asset('images/logo-diol.svg')}}" width="66" height="39" alt="Диол"
                                     class="footer-studio-media">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
