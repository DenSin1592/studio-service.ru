(function () {
    $(function () {
        $('.section-categories').each(function (_, container) {
            let jContainer = $(container),
            swiperContainer = jContainer.find('.swiper-categories'),
            prev = jContainer.find('.swiper-categories-button-prev'),
            next = jContainer.find('.swiper-categories-button-next');
            
            new Swiper(swiperContainer, {
                slidesPerView: 2,
                loop: true,
                breakpointsInverse: true,
                breakpoints: {
                    // when window width is >= 480px
                    480: {
                        // loop: slides.length > 2 ? true : false,
                        slidesPerView: 3,
                    },
                    // when window width is >= 750px
                    750: {
                        slidesPerView: 4,
                        // loop: slides.length > 2 ? true : false,
                    }
                },

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });
        });

        $('.section-services').each(function (_, container) {
            let jContainer = $(container),
            swiperContainer = jContainer.find('.swiper-services'),
            prev = jContainer.find('.swiper-services-button-prev'),
            next = jContainer.find('.swiper-services-button-next');

            new Swiper(swiperContainer, {
                slidesPerView: 'auto',
                loop: true,
                watchSlidesVisibility: true,
                breakpointsInverse: true,
                breakpoints: {
                    // when window width is >= 480px
                    480: {
                        // loop: slides.length > 2 ? true : false,
                        slidesPerView: 2,
                    },
                    // when window width is >= 750px
                    750: {
                        slidesPerView: 3,
                        // loop: slides.length > 2 ? true : false,
                    }
                },

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });
        });

        $('.section-expertises').each(function (_, container) {
            let jContainer = $(container);
            swiperContainer = jContainer.find('.swiper-expertises'),
            prev = jContainer.find('.swiper-expertises-button-prev'),
            next = jContainer.find('.swiper-expertises-button-next');

            new Swiper(swiperContainer, {
                slidesPerView: 2,
                loop: true,
                breakpointsInverse: true,
                breakpoints: {
                    // when window width is >= 480px
                    480: {
                        // loop: slides.length > 2 ? true : false,
                        slidesPerView: 3,
                    },
                    // when window width is >= 750px
                    750: {
                        slidesPerView: 4,
                        // loop: slides.length > 2 ? true : false,
                    }
                },

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });
        });

        $('.section-testimonials').each(function (_, container) {
            let jContainer = $(container);
            swiperContainer = jContainer.find('.swiper-testimonials'),
            prev = jContainer.find('.swiper-testimonials-button-prev'),
            next = jContainer.find('.swiper-testimonials-button-next'),
            pagination = jContainer.find('.swiper-testimonials-pagination'),
            paginationCurrent = pagination.find('.swiper-testimonials-pagination-current'),
            paginationTotal = pagination.find('.swiper-testimonials-pagination-total'),
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide');

            /**
             * Update active slide view.
             * print out number of active slide and so on.
             */
            let updateActiveSlideView = function () {
                if (paginationCurrent.length !== 0) {
                    paginationCurrent.text(slider.realIndex + 1 + ' из ');
                }
            };

            /**
             * Update visible parameters for slider and related elements according to current slider state.
             */
            let updateSliderView = function () {
                if (paginationTotal.length !== 0) {
                    paginationTotal.text(slides.length);
                }
                updateActiveSlideView();
            };

            let slider = new Swiper(swiperContainer, {
                slidesPerView: 1,
                loop: true,
                

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });

            updateSliderView();

            // On slide change change update current slide info
            slider.on('slideChange', function () {
                updateActiveSlideView();
            });
        });

        $('.section-projects').each(function (_, container) {
            let jContainer = $(container),
            swiperContainer = jContainer.find('.swiper-projects'),
            prev = jContainer.find('.swiper-projects-button-prev'),
            next = jContainer.find('.swiper-projects-button-next');

            new Swiper(swiperContainer, {
                slidesPerView: 1,
                loop: true,

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });
        });

        $('.swiper-includes').each(function (_, container) {
            let jContainer = $(container),
            swiperContainer = jContainer.find('.swiper-services'),
            prev = jContainer.find('.swiper-services-button-prev'),
            next = jContainer.find('.swiper-services-button-next');

            new Swiper(jContainer, {
                slidesPerView: 'auto',
                loop: true,
                watchSlidesVisibility: true,
                observer: true,
                observeParents: true,
                // breakpointsInverse: true,
                // breakpoints: {
                //     // when window width is >= 480px
                //     480: {
                //         // loop: slides.length > 2 ? true : false,
                //         slidesPerView: 2,
                //     },
                //     // when window width is >= 750px
                //     750: {
                //         slidesPerView: 3,
                //         // loop: slides.length > 2 ? true : false,
                //     }
                // },

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });
        });

        // $('.gallery-block').each(function (_, container) {
        //     let jContainer = $(container),
        //     swiperContainer = jContainer.find('.swiper-gallery'),
        //     prev = jContainer.find('.swiper-gallery-button-prev'),
        //     next = jContainer.find('.swiper-gallery-button-next'),
        //     pagination = jContainer.find('.swiper-gallery-pagination'),
        //     paginationCurrent = pagination.find('.swiper-gallery-pagination-current'),
        //     paginationTotal = pagination.find('.swiper-gallery-pagination-total'),
        //     slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide');

        //     /**
        //      * Update active slide view.
        //      * print out number of active slide and so on.
        //      */
        //     let updateActiveSlideView = function () {
        //         if (paginationCurrent.length !== 0) {
        //             paginationCurrent.text(slider.realIndex + 1 + ' из ');
        //         }
        //     };

        //     /**
        //      * Update visible parameters for slider and related elements according to current slider state.
        //      */
        //     let updateSliderView = function () {
        //         if (paginationTotal.length !== 0) {
        //             paginationTotal.text(slides.length);
        //         }
        //         updateActiveSlideView();
        //     };

        //     let slider = new Swiper(swiperContainer, {
        //         slidesPerView: 1,
        //         loop: true,
        //         touchRatio: 0,

        //         navigation: {
        //             nextEl: next,
        //             prevEl: prev,
        //         }
        //     });

        //     updateSliderView();

        //     // On slide change change update current slide info
        //     slider.on('slideChange', function () {
        //         updateActiveSlideView();
        //     });
        // });
    });
})();

