(function () {
    $(function () {
        var authMenuContainer = $(document).find('#auth-menu');

        if (window.localStorage.getItem('auth-menu') == 'opened') {
            authMenuContainer.removeClass('closed');
        }

        authMenuContainer.on('click', '[data-action="toggle"]', function () {
            var menuState = window.localStorage.getItem('auth-menu');

            if (menuState == undefined) {
                window.localStorage.setItem('auth-menu', 'opened');
            } else {
                window.localStorage.removeItem('auth-menu');
            }

            if (window.localStorage.getItem('auth-menu') == 'opened') {
                authMenuContainer.removeClass('closed');
            } else {
                authMenuContainer.addClass('closed');
            }
        });

        authMenuContainer.hover(
            function () {
                $(this).addClass('hovered');
                authMenuContainer.removeClass('closed');
            }, function () {
                $(this).removeClass('hovered');
                if (window.localStorage.getItem('auth-menu') != 'opened') {
                    authMenuContainer.addClass('closed');
                }
            }
        );
    });
})();
