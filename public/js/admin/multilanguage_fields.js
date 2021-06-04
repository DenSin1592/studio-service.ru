(function ($, document, window) {
    $(function () {
        $('.modal-multilanguage-fields').on('shown.bs.modal', function() {
            $(document).off('focusin.modal');
        });
    });
})(jQuery, document, window);