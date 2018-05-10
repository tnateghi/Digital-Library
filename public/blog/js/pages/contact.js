/*
 *  Document   : contact.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Contact page
 */

var Contact = function() {

    return {
        init: function() {


            /* Initialize Form Validation */
            $('#form-contact').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                rules: {
                    'contact-name': {
                        required: true
                    },
                    'contact-email': {
                        required: true,
                        email: true
                    },
                    'contact-message': {
                        required: true
                    }
                },
                messages: {
                    'contact-name': {
                        required: 'لطفا نام خود را وارد کنید'
                    },
                    'contact-email': 'لطفا یک ایمیل معتبر وارد کنید',
                    'contact-message': {
                        required: 'لطفا متن پیام را وارد کنید'
                    }
                }
            });
        }
    };
}();