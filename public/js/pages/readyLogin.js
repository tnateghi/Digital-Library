/*
 *  Document   : readyLogin.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Login page
 */

var ReadyLogin = function () {

    return {
        init: function () {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Login form - Initialize Validation */
            $('#form-login').validate({
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
                    'email': {
                        required: true,
                        email: true
                    },
                    'username': {
                        required: true
                    },
                    'first-name': {
                        required: true
                    },
                    'last-name': {
                        required: true
                    },
                    'login-password': {
                        required: true,
                        minlength: 5
                    },
                    'password': {
                        required: true
                    },
                    'confirm-password': {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {
                    'username': 'لطفا نام کاربری خود را وارد کنید',
                    'first-name': 'لطفا نام خودتان را وارد کنید',
                    'last-name': 'لطفا نام خانوادگی خودتان را وارد کنید',
                    'password': {
                        required: 'لطفا گذرواژه خود را وارد کنید'
                    },
                    'confirm-password': {
                        required: 'لطفا گذرواژه را تایید کنید',
                        minlength: 'طول گذرواژه نمیتواند کمتر از 8 کاراکتر باشد',
                        equalTo: 'تکرار گذرواژه همخوانی ندارد'
                    },
                    'email': 'لطفا یک ایمیل معتبر وارد کنید',
                    'login-password': {
                        required: 'Please provide your password',
                        minlength: 'Your password must be at least 5 characters long'
                    }
                }
            });
        }
    };
}();