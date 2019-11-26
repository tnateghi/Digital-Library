/*
 *  Document   : bookCreate.js
 *  Author     : nateghi
 *  Description: Custom javascript code used in user edit page
 */

var FormsValidation = function () {

    return {
        init: function () {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-validation').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function (error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function (e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'first-name': {
                        required: true
                    },
                    'last-name': {
                        required: true
                    },

                    'tel': {
                        required: true,
                        number: true
                    },
                    'address': {
                        required: true
                    }
                },
                messages: {

                    'first-name': 'لطفا نام کاربر را وارد کنید',
                    'last-name': 'لطفا نام خانوادگی کاربر را وارد کنید',
                    'tel': {
                        required: 'لطفا شماره تلفن کاربر را وارد کنید',
                        number: 'لطفا یک تلفن معتبر وارد کنید',
                    },
                    'address': 'لطفا آدرس کاربر را وارد کنید',
                }
            });

        }
    };
}();