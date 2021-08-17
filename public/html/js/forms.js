(function () {
    $(function () {
        // custom input type file
        bsCustomFileInput.init();


        $('.anchor-button').on('click', function(e) {
            let target = $(e.currentTarget)
                targetSection = '#' + target.attr('data-target');

            if(targetSection !== "") {
                event.preventDefault();

                let hash = targetSection;
                let headerContainer = $('.header-box');
                $(headerContainer).addClass('is-sticky');

                setTimeout(() => {
                    // wait to get height of fixed header
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - $(headerContainer).outerHeight()
                    }, 800);
                }, 200);
            }
        })
    });
})();