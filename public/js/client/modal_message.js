(function ($) {
    $(function () {

        let modalMessage = $('#modalMessage');

        window.modalMessageShow = (title, message) => {
            modalMessage.find('.modal-title').append(title);
            modalMessage.find('.modal-body').append(message);

            setTimeout(()=>{
                modalMessage.modal('show');
            }, 500)
            setTimeout(()=>{
                modalMessage.modal('hide');
            }, 3000)

        };

        modalMessage.on('hidden.bs.modal', () => {
            modalMessage.find('.modal-title').html('');
            modalMessage.find('.modal-body').html('');
        });
    });
})(jQuery);
