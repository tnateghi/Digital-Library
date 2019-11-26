/*
 *  Document   : readyLogin.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Login page
 */

var ReadyResetpass = function () {

    return {
        init: function () {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Login form - Initialize Validation */
            $('#form-resetpass').validate({
                errorClass: 'help-block animation-slideUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function (error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function (e) {
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                rules: {

                    'password': {
                        required: true,
                        minlength: 8
                    },
                    'confirm-password': {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {

                    'password': {
                        required: 'لطفا گذرواژه خود را وارد کنید',
                        minlength: 'طول گذرواژه نمیتواند کمتر از 8 کاراکتر باشد'
                    },
                    'confirm-password': {
                        required: 'لطفا گذرواژه را تایید کنید',
                        minlength: 'طول گذرواژه نمیتواند کمتر از 8 کاراکتر باشد',
                        equalTo: 'تکرار گذرواژه همخوانی ندارد'
                    }
                }
            });
        }
    };
}();