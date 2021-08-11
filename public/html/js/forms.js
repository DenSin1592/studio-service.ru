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

                $('html, body').animate({
                    scrollTop: $(hash).offset().top - $('.header-box').outerHeight()
                }, 800, function(){
                    window.location.hash = hash;
                });
            }
        })
    });
})();