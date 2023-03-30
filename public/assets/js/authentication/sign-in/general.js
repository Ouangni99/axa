"use strict";

// Class definition
var KTSigninGeneral = function () {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Set all the variables required
    var formID = 'auth_form',
        remoteLogin = {
            Login: 'login',
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
    var handleValidation = function (e) {
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
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
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
    }

    var handleSubmitDemo = function (e) {
        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Get all the required data
                    let formElement = $('#kt_sign_in_form'),
                        formData = new FormData(formElement[0]);

                    $.ajax({
                        method: 'post',
                        url: hostUrl + '/' + lang + '/' + remoteLogin.Login,
                        processData: false,
                        contentType: false,
                        // CSRF verification
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: formData,
                    }).done(function (response) {
                            submitButton.removeAttribute('data-kt-indicator');
                            // toastr.success('Connexion établie , Rédirection');

                            var redirectUrl = form.getAttribute('data-kt-redirect-url');
                            if (redirectUrl) {
                                location.href = redirectUrl;
                            }
                    })
                    .fail(function () {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');
                        toastr.error('Ces références ne correspondent pas à nos enregistrement');

                        // Disable button to avoid multiple click
                        submitButton.disabled = false;
                    })

                } else {
                    toastr.error('Désolé, il semble que des erreurs aient été détectées, veuillez réessayer');
                }
            });
        });

        form.addEventListener('submit', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // Get all the required data
                    let formElement = $('#kt_sign_in_form'),
                        formData = new FormData(formElement[0]);

                    $.ajax({
                        method: 'post',
                        url: hostUrl + '/' + lang + '/' + remoteLogin.Login,
                        processData: false,
                        contentType: false,
                        // CSRF verification
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        data: formData,
                    }).done(function (response) {
                            submitButton.removeAttribute('data-kt-indicator');
                            // toastr.success('Connexion établie , Rédirection');

                            var redirectUrl = form.getAttribute('data-kt-redirect-url');
                            if (redirectUrl) {
                                location.href = redirectUrl;
                            }
                    })
                    .fail(function () {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');
                        toastr.error('Ces références ne correspondent pas à nos enregistrement');

                        // Disable button to avoid multiple click
                        submitButton.disabled = false;
                    })

                } else {
                    toastr.error('Désolé, il semble que des erreurs aient été détectées, veuillez réessayer');
                }
            });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');
            handleValidation();
            handleSubmitDemo();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
