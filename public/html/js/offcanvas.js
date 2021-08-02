(function () {
    $(function () {
        let offcanvasOpenButton = $('.offcanvas-toggle'),
            offcanvasCloseButton = $('.offcanvas-close'),
            offcanvasContainer = $('.offcanvas-wrapper');

        function initOffcanvas() {
            offcanvasContainer.removeClass('d-none');
        }
        
        setTimeout(initOffcanvas, 150);
        
        function openOffcanvas() {
            offcanvasContainer.addClass('is-open');
        }

        function closeOffcanvas() {
            offcanvasContainer.removeClass('is-open');
        }
        
        $(offcanvasOpenButton).on('click', openOffcanvas);
        $(offcanvasCloseButton).on('click', closeOffcanvas);
    });
})();