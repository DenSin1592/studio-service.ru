(function ($) {
    $(function () {

        let authMenuContainer = $(document).find('#auth-menu');

        if (window.localStorage.getItem('auth-menu') === 'opened') {
            authMenuContainer.removeClass('closed');
        }


        authMenuContainer.on('click', '[data-action="toggle"]', () => {
            let menuState = window.localStorage.getItem('auth-menu');

            if (menuState === undefined) {
                window.localStorage.setItem('auth-menu', 'opened');
            } else {
                window.localStorage.removeItem('auth-menu');
            }

            if (window.localStorage.getItem('auth-menu') === 'opened') {
                authMenuContainer.removeClass('closed');
            } else {
                authMenuContainer.addClass('closed');
            }
        });


        authMenuContainer.hover(
            () => {
                $(this).addClass('hovered');
                authMenuContainer.removeClass('closed');
            },
            () => {
                $(this).removeClass('hovered');
                if (window.localStorage.getItem('auth-menu') !== 'opened') {
                    authMenuContainer.addClass('closed');
                }
            }
        );
    });
})(jQuery);
