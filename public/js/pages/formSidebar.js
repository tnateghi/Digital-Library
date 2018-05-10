/*
 *  Document   : formsidebar.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in sidebar form
 */

var sidebar = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Login form - Initialize Validation */
            $('#formsidebar').validate({
                errorClass: 'help-block animation-slideUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                rules: {

					'current-pass': {
                        required: true
                    },
					'new-pass': {
                        required: true,
						minlength: 8
                    },
					'new-pass-confirm': {
                        required: true,
                        equalTo: '#new-pass'
                    }
                },
                messages: {
					'current-pass': 'لطفا گذرواژه فعلی را وارد کنید',
                    'new-pass': {
                        required: 'لطفا گذرواژه جدید را وارد کنید',
                        minlength: 'طول گذرواژه نمیتواند کمتر از 8 کاراکتر باشد'
                    },
					'new-pass-confirm': {
                        required: 'لطفا گذرواژه را تایید کنید',
                        minlength: 'طول گذرواژه نمیتواند کمتر از 8 کاراکتر باشد',
                        equalTo: 'تکرار گذرواژه همخوانی ندارد'
                    }
                }
            });
        }
    };
}();