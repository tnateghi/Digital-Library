/*
 *  Document   : bookCreate.js
 *  Author     : nateghi
 *  Description: Custom javascript code used in book create and edit page
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
                    'bookName': {
                        required: true
                    },
                    'author': {
                        required: true,
                    },
                    'bookmaker': {
                        required: true
                    },

                    'category': {
                        required: true
                    },
                    'ed_year': {
                        required: true,
                        number: true
                    },
                    'count': {
                        required: true,
                        min: 1
                    }
                },
                messages: {

                    'author': 'لطفا نام نویسنده را وارد کنید',
                    'category-name': 'لطفا نام دسته بندی را وارد کنید',
                    'bookName': 'لطفا نام کتاب را وارد کنید',
                    'category': 'لطفا یک دسته انتخاب کنید',
                    'bookmaker': 'لطفا ناشر کتاب را وارد کنید',
                    'ed_year': 'لطفا سال چاپ را به عدد وارد کنید',
                    'count': 'لطفا عددی بزرگتر از 1 وارد کنید',
                }
            });

        }
    };
}();