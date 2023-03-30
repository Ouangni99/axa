"use strict";

// Class definition
var KTSignupGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;
    var passwordMeter;

    // Set all the variables required
    var formID = 'auth_form',
    remoteRegister = {
        register: 'register',
    };

    // SET TOASTR SETUP
    toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toastr-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    };

    // Handle form
    var handleForm  = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
					'first-name': {
						validators: {
							notEmpty: {
								message: 'First Name is required'
							}
						}
                    },
                    'last-name': {
						validators: {
							notEmpty: {
								message: 'Last Name is required'
							}
						}
					},
					'email': {
                        validators: {
                            regexp: {
                                regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                message: 'The value is not a valid email address',
                            },
							notEmpty: {
								message: 'Email address is required'
							}
						}
					},
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            callback: {
                                message: 'Please enter valid password',
                                callback: function(input) {
                                    if (input.value.length > 0) {
                                        return validatePassword();
                                    }
                                }
                            }
                        }
                    },
                    'confirm-password': {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    'toc': {
                        validators: {
                            notEmpty: {
                                message: 'You must accept the terms and conditions'
                            }
                        }
                    }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }
                    }),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
				}
			}
		);

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validator.revalidateField('password');

            validator.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Get all the required data
                    let formElement = $('#kt_sign_up_form'),
                    formData = new FormData(formElement[0]);
                    // SET REQUEST
                    axios({
                        method: 'post',
                        url: hostUrl + '/' + remoteRegister.register,
                        processData: false,
                        contentType: false,
                        // CSRF verification
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: formData,
                    }).then(function () {

                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');
                        toastr.success('Compte crée,la redirection...');


                        var redirectUrl = form.getAttribute('data-kt-redirect-url');
                        if (redirectUrl) {
                            location.href = redirectUrl;
                        }

                        // return response
                        // Swal.fire({
                        //     text: "Compte crée, veuillez sur loger pour effectuer la redirection.!",
                        //     icon: "success",
                        //     buttonsStyling: false,
                        //     confirmButtonText: "Ok, Se Loger !",
                        //     customClass: {
                        //         confirmButton: "btn btn-primary"
                        //     }
                        // }).then(function (result) {
                        //     if (result.isConfirmed) {
                        //         form.reset();  // reset form
                        //         passwordMeter.reset();  // reset password meter
                        //         //form.submit();

                        //         //form.submit(); // submit form
                        //         var redirectUrl = form.getAttribute('data-kt-redirect-url');
                        //         if (redirectUrl) {
                        //             location.href = redirectUrl;
                        //         }
                        //     }
                        // });

                    }).catch(function (error) {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');
                    });

                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
		    });
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            validator.revalidateField('password');

            validator.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Get all the required data
                    let formElement = $('#kt_sign_up_form'),
                    formData = new FormData(formElement[0]);
                    // SET REQUEST
                    axios({
                        method: 'post',
                        url: hostUrl + '/' + remoteRegister.register,
                        processData: false,
                        contentType: false,
                        // CSRF verification
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: formData,
                    }).then(function () {

                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // return response
                        Swal.fire({
                            text: "Compte crée, veuillez sur loger pour effectuer la redirection.!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, Se Loger !",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                form.reset();  // reset form
                                passwordMeter.reset();  // reset password meter
                                //form.submit();

                                //form.submit(); // submit form
                                var redirectUrl = form.getAttribute('data-kt-redirect-url');
                                if (redirectUrl) {
                                    location.href = redirectUrl;
                                }
                            }
                        });

                    }).catch(function (error) {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');
                    });

                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
		    });
        });

        // Handle password input
        form.querySelector('input[name="password"]').addEventListener('input', function() {
            if (this.value.length > 0) {
                validator.updateFieldStatus('password', 'NotValidated');
            }
        });
    }

    // Password input validation
    var validatePassword = function() {
        return (passwordMeter.getScore() === 100);
    }

    // initialisation intlTelInput
    var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            // any initialisation options go here
    });

    // Public functions
    return {
        // Initialization
        init: function() {
            // Elements
            form = document.querySelector('#kt_sign_up_form');
            submitButton = document.querySelector('#kt_sign_up_submit');
            passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter="true"]'));

            handleForm ();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSignupGeneral.init();
});
