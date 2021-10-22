(function () {
    $(function () {
        $('.card-service').on('click', '.card-service-include-item[onclick]', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
    });
})();