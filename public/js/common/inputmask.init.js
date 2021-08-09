(function () {
    $(function () {
        let isAndroid = function () {
            let userAgent = navigator.userAgent.toLowerCase();

            return (userAgent.indexOf("android") > -1);
        };

        window.initClientPhoneMask = function () {
            if (!isAndroid()) {
                $('[data-client-phone-mask]').inputmask('+7 (999) 999-99-99', {
                    clearMaskOnLostFocus: true
                });
            }
        };

        initClientPhoneMask();
    });
})();
