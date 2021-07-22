let headerContainer = $('.header-box');

function fixedHeader() {
    let windowOffset = $(window).scrollTop();

    if(windowOffset > 0) {
        headerContainer.addClass('is-sticky');
    } else {
        headerContainer.removeClass('is-sticky');
    }
}

(function () {
    $(function () {
        fixedHeader();
    });

    $(window).on('scroll', function() {
        fixedHeader();
    })
})();