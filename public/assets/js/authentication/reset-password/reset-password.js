"use strict";

// Class Definition
var KTAuthResetPassword = function() {
    // Elements
    var form;
    var submitButton;
	var validator;

    // Set all the variables required
    let remoteResetLink = {
        reset: 'forgot-password',
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

    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {
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
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
						eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
				}
			}
		);

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Get all the required data
                    let formElement = $('#kt_password_reset_form'),
                    formData = new FormData(formElement[0]);

                    // SET REQUEST
                    axios({
                        method: 'post',
                        url: hostUrl + '/' + remoteResetLink.reset,
                        processData: false,
                        contentType: false,
                        // CSRF verification
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: formData,
                    }).then(function (result) {

                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // return response
                        if (result) {
                            form.querySelector('[name="email"]').value= "";
                        } else {
                            // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            Swal.fire({
                                text: "Désolé, l'email est incorrect, veuillez réessayer.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }

                    }).catch(function (error) {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');
                    });

                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Désolé, il semble que des erreurs aient été détectées, veuillez réessayer..",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Okey !",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
            });
		});
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            form = document.querySelector('#kt_password_reset_form');
            submitButton = document.querySelector('#kt_password_reset_submit');

            handleForm();

        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAuthResetPassword.init();
});
