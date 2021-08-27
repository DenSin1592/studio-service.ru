(function () {
    $(function () {
        $('.card-service').on('click', '.card-service-include-item[data-toggle]', function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
    });
})();