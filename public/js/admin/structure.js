(function ($, document) {
    $(function () {
        // Show/hide alias for home page type
        var nodeTypeSelector = 'select[data-node-type]';
        var handleNodeType = function (nodeTypeSelect) {
            var isHomePage = false;
            var selectedOption = $(nodeTypeSelector + ' option[value=' + nodeTypeSelect.val() + ']').eq(0);
            if (selectedOption.length === 1) {
                isHomePage = selectedOption.data('homePage');
            }
            $('#alias').parents('.form-group').css('display', isHomePage ? 'none' : 'block');
        };
        $(document).on('change', 'select[data-node-type]', function () {
            handleNodeType($(this));
        });
        handleNodeType($(nodeTypeSelector));
    });
})(jQuery, document);
