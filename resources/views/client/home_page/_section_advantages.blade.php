<section class="section-advantages">
    <div class="container">
        <div class="row">
            <div class="col-xxl-10 offset-xxl-1">
                <div class="section-header">
                    <div class="section-title title-h1">Все работы в одних руках опытной компании</div>
                    <div class="section-subtitle title-h3">Ничто так не влияет на цену, как отсутствие
                        субподрядчиков!
                    </div>
                </div>

                <div class="advantages-grid row">
                    <div class="advantage-item col-12 col-md-6 col-lg-3">
                        <div class="card-advantage">
                            <div class="row">
                                <div class="card-advantage-media-container col-auto col-lg-12">
                                    <div
                                        class="card-advantage-thumbnail d-flex align-items-start align-items-lg-center justify-content-start">
                                        <img loading="lazy"
                                             src="{{asset('images/icons/advantage/icon-advantage-cycle.png')}}"
                                             width="130" height="130" alt="Полный цикл услуг"
                                             class="card-advantage-media">
                                    </div>
                                </div>

                                <div class="card-advantage-typography-container col col-lg-12">
                                    <div class="card-advantage-title">Полный цикл услуг</div>
                                    <div class="card-advantage-description">От первой консультации до внедрения
                                        системы и обучения сотрудников.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="advantage-item col-12 col-md-6 col-lg-3">
                        <div class="card-advantage">
                            <div class="row">
                                <div class="card-advantage-media-container col-auto col-lg-12">
                                    <div
                                        class="card-advantage-thumbnail d-flex align-items-start align-items-lg-center justify-content-start">
                                        <img loading="lazy"
                                             src="{{asset('images/icons/advantage/icon-advantage-receipt.png')}}"
                                             width="149" height="130" alt="Отсутствие доп.расходов"
                                             class="card-advantage-media">
                                    </div>
                                </div>

                                <div class="card-advantage-typography-container col col-lg-12">
                                    <div class="card-advantage-title">Отсутствие доп.расходов</div>
                                    <div class="card-advantage-description">Заказ полного цикла услуг у одной
                                        компании означает отсутствие дополнительных смет и расходов.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="advantage-item col-12 col-md-6 col-lg-3">
                        <div class="card-advantage">
                            <div class="row">
                                <div class="card-advantage-media-container col-auto col-lg-12">
                                    <div
                                        class="card-advantage-thumbnail d-flex align-items-start align-items-lg-center justify-content-start">
                                        <img loading="lazy"
                                             src="{{asset('images/icons/advantage/icon-advantage-infinity.png')}}"
                                             width="160" height="70" alt="Вложения на годы"
                                             class="card-advantage-media">
                                    </div>
                                </div>

                                <div class="card-advantage-typography-container col col-lg-12">
                                    <div class="card-advantage-title">Вложения на годы</div>
                                    <div class="card-advantage-description">Используем только современные решение,
                                        которые прослужат вам долго без модернизации.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="advantage-item col-12 col-md-6 col-lg-3">
                        <div class="card-advantage">
                            <div class="row">
                                <div class="card-advantage-media-container col-auto col-lg-12">
                                    <div
                                        class="card-advantage-thumbnail d-flex align-items-start align-items-lg-center justify-content-start">
                                        <img loading="lazy"
                                             src="{{asset('images/icons/advantage/icon-advantage-100.png')}}"
                                             width="220" height="71" alt="Более 100 внедренных проектов"
                                             class="card-advantage-media">
                                    </div>
                                </div>

                                <div class="card-advantage-typography-container col col-lg-12">
                                    <div class="card-advantage-title">Более 100 внедренных проектов</div>
                                    <div class="card-advantage-description">И почти 30 лет успешной работы на
                                        рынке.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="advantages-text-lead title-h3 text-purple">Даже то, что вы можете не видеть, мы делаем
                    качественно!
                </div>

                <div class="advantages-gallery-block">
                    <div class="gallery-block">
                        <div class="gallery-controls-container d-flex align-items-center justify-content-sm-end">
                            <div class="swiper-gallery-pagination-wrapper swiper-pagination-wrapper">
                                <div class="swiper-gallery-pagination swiper-pagination swiper-pagination-fraction">
                                        <span
                                            class="swiper-gallery-pagination-current swiper-pagination-current"></span>
                                    <span class="swiper-gallery-pagination-total swiper-pagination-total"></span>
                                </div>
                            </div>

                            <div
                                class="swiper-gallery-navigation-wrapper swiper-navigation-wrapper d-flex align-items-center">
                                <button type="button"
                                        class="swiper-gallery-button-prev swiper-button-prev swiper-button-sm d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-prev-media" width="14" height="14">
                                        <use xlink:href="images/icons/sprite.svg#icon-angle-left"></use>
                                    </svg>
                                </button>

                                <button type="button"
                                        class="swiper-gallery-button-next swiper-button-next swiper-button-sm d-flex align-items-center justify-content-center">
                                    <svg class="swiper-button-next-media" width="14" height="14">
                                        <use xlink:href="images/icons/sprite.svg#icon-angle-right"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="swiper-gallery-cover swiper-cover">
                            <div class="swiper-gallery swiper-container">
                                <div class="swiper-wrapper">

                                    {!! $page->block_advantages !!}

                                    {{--<div class="swiper-slide">
                                        <div class="gallery-header-container d-flex flex-column justify-content-center">
                                            <div class="gallery-description"><b>Пример:</b> Проложенные трассы по виду одного из наших проектов</div>
                                        </div>

                                        <div class="twentytwenty-container">
                                            <div class="twentytwenty-block">
                                                <img src="uploads/advantages/example-item-1-before.jpg" class="twentytwenty-media" alt="">
                                                <img src="uploads/advantages/example-item-1-after.jpg" class="twentytwenty-media" alt="">
                                            </div>
                                        </div>
                                    </div>--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
