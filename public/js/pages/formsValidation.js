/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-validation').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
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
                    'username': {
                        required: true
                    },
					'address': {
                        required: true
                    },
					'national-code': {
                        required: true,
						number: true,
                        minlength: 10,
						maxlength: 10
                    },
					'author': {
                        required: true,
                    },
					'category-name': {
                        required: true,
                    },
					'delete-category': {
                        required: true,
                    },
					'replace-category': {
                        required: true,
                    },
					'first-name': {
                        required: true,
                    },
					'last-name': {
                        required: true,
                    },
					'bookid': {
                        required: true,
						number: true
                    },
					'user-active-period': {
                        required: true,
						number: true
                    },
                    'email2': {
                        required: true,
                        email: true
                    },
					'email': {
                        email: true
                    },
                    'password': {
                        required: true,
                        minlength: 5
                    },
                    'confirm-password': {
                        required: true,
                        equalTo: '#password'
                    },
                    'suggestions': {
                        required: true,
                        minlength: 5
                    },
					'description': {
                        required: false
                    },
					'bookName': {
                        required: true
                    },
                    'bookmaker': {
                        required: true
                    },
					'skill': {
                        required: true
                    },
					'category': {
                        required: true
                    },
					'rule': {
                        required: true
                    },
                    'website': {
                        required: true,
                        url: true
                    },
                    'digits': {
                        required: true,
                        digits: true
                    },
                    'number': {
                        required: true,
                        number: true
                    },
					'ed_year': {
                        required: true,
                        number: true
                    },
					'ed_period': {
                        required: true,
                        number: true
                    },
					'tel': {
                        required: true,
                        number: true
                    },
                    'count': {
                        required: true,
                        range: [1, 100]
                    },
                    'terms': {
                        required: true
                    }
                },
                messages: {
                    'username': {
                        required: 'لطفا نام کاربری را وارد کنید'
                    },
					'national-code': {
                        required: 'لطفا کد ملی کاربر را وارد کنید',
						number: 'کد ملی نمی تواند شامل کاراکترهای غیر عددی باشد',
                        minlength: 'کد ملی باید ده رقمی باشد',
						maxlength: 'کد ملی باید ده رقمی باشد'
                    },
                    'email2': 'Please enter a valid email address',
					'email': 'لطفا آدرس ایمیل معتبر وارد کنید',
                    'password': {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long'
                    },
                    'confirm-password': {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long',
                        equalTo: 'Please enter the same password as above'
                    },
					'user-active-period': {
                        required: 'لطفا دوره تمدید کاربر را وارد کنید',
                        number: 'لطفا به عدد وارد کنید'
                    },
                    'suggestions': 'What can we do to become better?',
					'address': 'لطفا آدرس کاربر را وارد کنید',
					'author': 'نام نویسنده را وارد کنید',
					'first-name': 'لطفا نام کاربر را وارد کنید',
					'category-name': 'لطفا نام دسته بندی را وارد کنید',
					'last-name': 'لطفا نام خانوادگی کاربر را وارد کنید',
					'bookName': 'لطفا نام کتاب را وارد کنید',
                    'skill': 'لطفا یک مهارت انتخاب کنید!',
					'category': 'لطفا یک دسته انتخاب کنید',
					'rule': 'لطفا نقش کاربر را انتخاب کنید',
                    'website': 'Please enter your website!',
					'bookmaker': 'لطفا ناشر کتاب را وارد کنید',
                    'digits': 'Please enter only digits!',
                    'number': 'Please enter a number!',
					'bookid': 'لطفا بارکد را به درستی وارد کنید',
					'ed_year': 'لطفا سال چاپ را به عدد وارد کنید',
					'tel': 'لطفا شماره تلفن کاربر را به درستی وارد کنید',
					'ed_period': 'لطفا نوبت چاپ را به عدد وارد کنید',
					'delete-category': 'لطفا یک دسته بندی برای حذف انتخاب کنید',
					'replace-category': 'لطفا دسته بندی جایگزین را انتخاب کنید',
                    'count': 'لطفا عددی بین 1 تا 100 وارد کنید',
                    'terms': 'You must agree to the service terms!'
                }
            });
			$('#form-validation1').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
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
					'delete-category': {
                        required: true,
                    },
					'replace-category': {
                        required: true,
                    }
                },
                messages: {
					'delete-category': 'لطفا یک دسته بندی برای حذف انتخاب کنید',
					'replace-category': 'لطفا دسته بندی جایگزین را انتخاب کنید'
                    
                }
            });
			
			$('#form-validation-extend').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
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
					'extend-username': {
                        required: true,
                    }
                },
                messages: {
					'extend-username': 'لطفا نام کاربری را وارد کنید'
                    
                }
            });
			
			$('#form-validation-return').validate({
                errorClass: 'help-block animation-pullUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
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
					'return-bookid': {
                        required: true,
						number: true
                    }
                },
                messages: {
					'return-bookid': 'لطفا بارکد کتاب را به درستی وارد کنید'
                    
                }
            });
        }
    };
}();