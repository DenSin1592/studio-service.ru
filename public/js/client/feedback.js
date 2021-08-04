(function($){
    $(function (){

        $('#modalCallback').each((_, modal) => {
            modal = $(modal);
            let form = modal.find('form');
            let submit = form.find('[type="submit"]');

            form.validate({
                ignore: '',
                rules: {
                    /*name: {
                        required: true
                    },
                    phone: {
                        required: true,
                        phoneNumber: true
                    },
                    email: {
                        email: true
                    },
                    privacy: {
                        required: true
                    }*/
                },
                messages: {
                    /*name: {
                        required: 'Пожалуйста, укажите имя.'
                    },
                    phone: {
                        required: 'Пожалуйста, укажите телефон.',
                        phoneNumber: 'Пожалуйста, укажите коректный номер телефона(Например, в формате +7 (999) 999-99-99).'
                    },
                    email: {
                        email: 'Пожалуйста, укажите корректный адрес электронной почты'
                    },
                    privacy: {
                        required: 'Согласие с политикой конфиденциальности обязательно для оформления заявки.'
                    }*/
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                },
                submitHandler: () => {
                    form.find('.form-error').remove();
                    $.ajax({
                        url: form.get(0).action,
                        method: form.get(0).method,
                        data: new FormData(form.get(0)),
                        cache: false,
                        contentType: false,
                        processData: false,
                    })

                    return false;
                }
            });
        });


    })
})(jQuery);

/*(function () {
    $(function () {



        $('#modalCallback').each(function (_, modal) {
            modal = $(modal);
            var form = modal.find('form');
            var submit = form.find('[type="submit"]');

            form.validate({
                ignore: '',
                rules: {
                    name: {required: true},
                    phone: {
                        required: true,
                        phoneNumber: true
                    },
                    privacy: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: 'Пожалуйста, укажите имя.'
                    },
                    phone: {
                        required: 'Пожалуйста, укажите телефон.'
                    },
                    privacy: {
                        required: 'Согласие с политикой конфиденциальности обязательно для оформления заявки.'
                    }
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") === "privacy") {
                        error.appendTo(element.closest('.form-group'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: () => {
                    if (submit.hasClass('loading')) {
                        return;
                    }
                    submit.addClass('loading');
                    form.find('.form-error').remove();

                    $.ajax({
                        url: form.get(0).action,
                        method: form.get(0).method,
                        data: form.serialize(),
                        cache: false
                    }).then(function (result) {
                        if (result['success']) {
                            form.get(0).reset();
                            modal.one('hidden.bs.modal', function () {
                                modalMessageShow(result['title'], result['content']);
                            });
                            modal.modal('hide');
                        } else {
                            var errors = result['errors'];
                            var flattenErrors = [];
                            Object.keys(errors).forEach(function (key) {
                                errors[key].forEach(function (error) {
                                    flattenErrors.push(error);
                                });
                            });

                            var lastErrorElement = null;
                            flattenErrors.forEach(function (error) {
                                var errorElement = $('<p class="form-error"></p>');
                                errorElement.text(error);
                                if (lastErrorElement === null) {
                                    form.prepend(errorElement);
                                } else {
                                    lastErrorElement.after(errorElement);
                                }
                                lastErrorElement = errorElement;
                            });
                        }
                    }).then(function () {
                        submit.removeClass('loading');
                    });
                }
            });
        });




    });
})();*/

/*(function () {
    $(function () {

        let form = $('#footer-callback-form');
        let formSubmit = form.find('button');

        form.validate({
            ignore: '',
            rules: {
                phone: {
                    required: true,
                    phoneNumber: true
                }
            },
            messages: {
                phone: {
                    required: 'Пожалуйста, укажите телефон.'
                }
            },
            errorPlacement:  (error, element) => {
                error.insertAfter(element);
            },
            submitHandler:  () => {
                if (formSubmit.hasClass('loading'))
                    return false;

                formSubmit.addClass('loading');

                $.ajax({
                    url: form.get(0).action,
                    method: form.get(0).method,
                    data: form.serialize(),
                    cache: false
                }).then( response => {
                    if(response['success'] === true){
                        form.get(0).reset();
                        modalMessageShow(response['title'], response['content']);
                    }
                }).then(function () {
                    formSubmit.removeClass('loading');
                });
            }
        });
    });
})();*/



/*fetch(form.get(0).action,
    {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    }
).then((response) => {
    if (response.ok) {
        inputsChecked.each((_, elem) => {
            elem.closest('li').remove();
            setCountModels();
            if ($('ul.element-list li').length === 0)
                window.location.reload();
        });
        formButton.removeClass('loading');
    } else {
        $(form).after('<div class="warning error">Сбой в работе системы! Пожалуйста, обратитесь в службу поддержки!</div>');
    }
})*/


