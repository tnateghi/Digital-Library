/*
 *  Document   : readyRegister.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Register page
 */

var ReadyRegister = function () {

    return {
        init: function () {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Register form - Initialize Validation */
            $('#form-register').validate({
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
                    if (e.closest('.form-group').find('.help-block').length === 2) {
                        e.closest('.help-block').remove();
                    } else {
                        e.closest('.form-group').removeClass('has-success has-error');
                        e.closest('.help-block').remove();
                    }
                },
                rules: {
                    'first-name': {
                        required: true
                    },
                    'last-name': {
                        required: true
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'national-code': {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10

                    },
                    'tel': {
                        required: true,
                        number: true
                    },
                    'register-terms': {
                        required: true
                    },
                    'address': {
                        required: true
                    }
                },
                messages: {
                    'first-name': {
                        required: 'لطفا نام خود را وارد کنید'
                    },
                    'last-name': {
                        required: 'لطفا نام خانوادگی خود را وارد کنید'
                    },
                    'email': 'لطفا یک آدرس ایمیل معتبر وارد کنید',
                    'national-code': {
                        required: 'لطفا کد ملی خود را وارد کنید',
                        number: 'لطفا به عدد وارد کنید',
                        minlength: 'کد ملی باید ده رقمی باشد',
                        maxlength: 'کد ملی باید ده رقمی باشد'

                    },
                    'tel': {
                        required: 'لطفا شماره تلفن خود را وارد کنید',
                        number: 'شماره تلفن نمی تواند شامل کاراکتر غیر عددی باشد'
                    },
                    'register-terms': {
                        required: 'لطفا شرایط را بخوانید'
                    },
                    'address': {
                        required: 'لطفا آدرس خود را وارد کنید'
                    }
                }
            });
        }
    };
}();