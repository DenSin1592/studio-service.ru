(function () {
    $(function () {
        $('.section-categories').each(function (_, container) {
            let jContainer = $(container),
            swiperContainer = jContainer.find('.swiper-categories'),
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
            prev = jContainer.find('.swiper-categories-button-prev'),
            next = jContainer.find('.swiper-categories-button-next');
            
            new Swiper(swiperContainer, {
                direction: 'horizontal',
                slidesPerView: 2,
                slidesPerGroup: 2,
                loop: slides.length > 2 ? true : false,
                breakpointsInverse: true,
                breakpoints: {
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                        loop: slides.length > 3 ? true : false,
                    },
                    // when window width is >= 750px
                    750: {
                        slidesPerView: 4,
                        slidesPerGroup: 4,
                        loop: slides.length > 4 ? true : false,
                    },
                    // when window width is >= 1680px
                    1680: {
                        loop: true,
                        slidesPerView: 'auto',
                        // slidesPerGroup: 1,
                        loopedSlides: slides.length,
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
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
            prev = jContainer.find('.swiper-services-button-prev'),
            next = jContainer.find('.swiper-services-button-next');

            new Swiper(swiperContainer, {
                direction: 'horizontal',
                slidesPerView: 'auto',
                loop: slides.length > 1 ? true : false,
                watchSlidesVisibility: true,
                breakpointsInverse: true,
                breakpoints: {
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                        loop: slides.length > 2 ? true : false,
                    },
                    // when window width is >= 750px
                    750: {
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                        loop: slides.length > 3 ? true : false,
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
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
            prev = jContainer.find('.swiper-expertises-button-prev'),
            next = jContainer.find('.swiper-expertises-button-next');

            new Swiper(swiperContainer, {
                slidesPerView: 2,
                slidesPerGroup: 2,
                loop: slides.length > 2 ? true : false,
                breakpointsInverse: true,
                breakpoints: {
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                        loop: slides.length > 3 ? true : false,
                    },
                    // when window width is >= 750px
                    750: {
                        slidesPerView: 4,
                        slidesPerGroup: 4,
                        loop: slides.length > 4 ? true : false,
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
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
            prev = jContainer.find('.swiper-testimonials-button-prev'),
            next = jContainer.find('.swiper-testimonials-button-next'),
            pagination = jContainer.find('.swiper-testimonials-pagination'),
            paginationCurrent = pagination.find('.swiper-testimonials-pagination-current'),
            paginationTotal = pagination.find('.swiper-testimonials-pagination-total');

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

        $('.section-target').each(function (_, container) {
            let jContainer = $(container),
            swiperContainer = jContainer.find('.swiper-target'),
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
            prev = jContainer.find('.swiper-target-button-prev'),
            next = jContainer.find('.swiper-target-button-next');

            // main slider
            new Swiper(swiperContainer, {
                slidesPerView: 'auto',
                loop: slides.length > 1 ? true : false,
                breakpointsInverse: true,
                breakpoints: {
                    // when window width is >= 480px
                    480: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                        loop: slides.length > 2 ? true : false,
                    },
                    // when window width is >= 750px
                    750: {
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                        loop: slides.length > 3 ? true : false,
                    }
                },

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                },
                
            });
        });

        $('.section-content').each(function (_, container) {
            let jContainer = $(container),
            swiperContainer = jContainer.find('.swiper-content'),
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
            prev = jContainer.find('.swiper-content-button-prev'),
            next = jContainer.find('.swiper-content-button-next');

            new Swiper(swiperContainer, {
                slidesPerView: 1,
                loop: slides.length > 1 ? true : false,

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });
        });

        $('.section-presentation').each(function (_, container) {
            let jContainer = $(container),
            swiperNavContainer = jContainer.find('.swiper-presentation-nav'),
            swiperNavSlides = swiperNavContainer.find('> .swiper-wrapper > .swiper-slide'),
            swiperContainer = jContainer.find('.swiper-presentation'),
            slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
            prev = jContainer.find('.swiper-presentation-button-prev'),
            next = jContainer.find('.swiper-presentation-button-next');

            let swiperMain = new Swiper(swiperContainer, {
                loop: true,
                navigation: {
                    nextEl: next,
                    prevEl: prev,
                },
                on: {
                    init: function () {
                        if (swiperNavContainer) {
                            swiperNavSlides.eq(this.realIndex).addClass('active');
                        }
                        if (swiperNavContainer) {
                            swiperNavSlides.eq(this.realIndex).addClass('active');
                        }
                    },
                    slideChange: function () {
                        if (swiperNavContainer) {
                            swiperNavSlides.removeClass('active');
                            swiperNavSlides.eq(this.realIndex).addClass('active');
                        }
                        if (swiperNavContainer) {
                            swiperThumbs.slideTo(this.realIndex);
                        }
                    }
                },
            });

            let swiperThumbs = new Swiper(swiperNavContainer, {
                slidesPerView: 'auto',
                breakpointsInverse: true,
                breakpoints: {
                    750: {
                        slidesPerView: 6,
                    }
                },
            });

            if(swiperNavContainer.length === 1) {
                swiperNavSlides.click(function (e) {
                    let index = swiperNavSlides.index(e.currentTarget);
                    // if loop in main slider enable
                    index += 1;

                    swiperMain.slideTo(index);
                    e.preventDefault();
                });
            }
        });

        $('.swiper-includes').each(function (_, container) {
            let jContainer = $(container),
            prev = jContainer.find('.swiper-includes-button-prev'),
            next = jContainer.find('.swiper-includes-button-next');

            new Swiper(jContainer, {
                slidesPerView: 'auto',
                loop: true,
                watchSlidesVisibility: true,
                observer: true,
                observeParents: true,

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                }
            });
        });

        // gallery
        $('.gallery-block').each(function (_, container) {
            let jContainer = $(container),
                swiperContainer = jContainer.find('.swiper-gallery'),
                slides = swiperContainer.find('> .swiper-wrapper > .swiper-slide'),
                prev = jContainer.find('.swiper-gallery-button-prev'),
                next = jContainer.find('.swiper-gallery-button-next'),
                pagination = jContainer.find('.swiper-gallery-pagination'),
                paginationCurrent = pagination.find('.swiper-gallery-pagination-current'),
                paginationTotal = pagination.find('.swiper-gallery-pagination-total');

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
                noSwipingClass: 'twentytwenty-handle',
                loop: slides.length > 1 ? true : false,

                navigation: {
                    nextEl: next,
                    prevEl: prev,
                },
            });

            updateSliderView();

            // On slide change change update current slide info
            slider.on('slideChange', function () {
                updateActiveSlideView();
            });
        });
    });
})();

