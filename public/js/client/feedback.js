(function($){
    $(function (){

            let modal = $('#modalCallback');
            let form = modal.find('form');
            let submit = form.find('[type="submit"]');
            let submitWrapper = submit.closest('div');
            let formError = form.find('.form-error');

            form.validate({
                ignore: '',
                rules: {
                    phone: {
                        required: true,
                        phoneNumber: true
                    },
                    email: {
                        email: true
                    },
                    file_project_file:{
                        extension: "jpg|jpeg|bmp|png|pdf"
                    },
                    privacy: {
                        required: true
                    }
                },
                messages: {
                    phone: {
                        required: 'Пожалуйста, укажите телефон.',
                        phoneNumber: 'Пожалуйста, укажите корректный номер телефона(Например, в формате +7 (999) 999-99-99).'
                    },
                    email: {
                        email: 'Пожалуйста, укажите корректный адрес электронной почты'
                    },
                    file_project_file:{
                        extension: "Файл должен быть в одном из следующих разрешений: jpg,jpeg,bmp,png,pdf"
                    },
                    privacy: {
                        required: 'Согласие с политикой конфиденциальности обязательно для оформления заявки.'
                    }
                },
                errorPlacement: (error, element) => {
                    if (element.attr("name") === "privacy") {
                        error.appendTo(element.closest('.form-group'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: () => {
                    formError.html('');
                    if(submitWrapper.hasClass('loader'))
                        return false;

                    submitWrapper.addClass('loader')

                    $.ajax({
                        url: form.get(0).action,
                        method: form.get(0).method,
                        data: new FormData(form.get(0)),
                        cache: false,
                        contentType: false,
                        processData: false,
                    }).then((res) => {
                        if(res['success']) {
                            modal.modal('hide');
                            modalMessageShow(res['title'], res['content']);
                            return false;
                        }

                        submitWrapper.removeClass('loader');
                        let errors = res['errors'];
                        for(let key in errors){
                            errors[key].forEach((error,) => {
                                formError.append('<p class=\'error\'>' + error + '</p>');
                            })
                        }
                    });
                }
            });


        modal.on('hidden.bs.modal', () => {
            resetForm();
        })
        let resetForm = () => {
            form.get(0).reset();
            form.find('input').removeClass('error');
            submitWrapper.removeClass('loader');
            formError.html('');
        };

    })
})(jQuery);
