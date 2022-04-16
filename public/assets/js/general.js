"use strict";
var KTSignupGeneral = (function () {
    var e,
        t,
        a,
        s,
        r = function () {
            return 100 === s.getScore();
        };
    return {
        init: function () {
            (e = document.querySelector("#kt_sign_up_form")),
                (t = document.querySelector("#kt_sign_up_submit")),
                (a = FormValidation.formValidation(e, {
                    fields: {
                        name: { validators: { notEmpty: { message: "Name is required" } } },
                        phone: { validators: { notEmpty: { message: "Phone is required" },tel:{message:"Please enter 10 digit"}
                    } },
                    
                        email: { validators: { notEmpty: { message: "Email address is required" }, emailAddress: { message: "The value is not a valid email address" } } },
                        password: {
                            validators: {
                                notEmpty: { message: "The password is required" },
                                strong: {
                                    message: "Minimum eight and maximum 16 characters, at least one uppercase letter, one lowercase letter, one number and one special character",
                                    
                                },
                            },
                        },
                        "confirm-password": {
                            validators: {
                                identical: {
                                    compare: function () {
                                        return e.querySelector('[name="password"]').value;
                                    },
                                    message: "The password and its confirm are not the same",
                                },
                            },
                        },
                        toc: { validators: { notEmpty: { message: "You must accept the terms and conditions" } } },
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger({ event: { password: !1 } }), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                })),
                t.addEventListener("click", function (r) {
                    r.preventDefault(),
                        a.revalidateField("password"),
                        a.validate().then(function (a) {
                            "Valid" == a
                                ? (t.setAttribute("data-kt-indicator", "on"),
                                  (t.disabled = !0),
                                  $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                }),
                                  $.ajax({
                                    type: "POST",
                                    url: base_path+'/register',
                                    data: $('#kt_sign_up_form').serialize(),
                                    dataType: "json",
                                    success: function(msg) {
                                        if(msg.status=='true'){
                                        setTimeout(function () {
                                            t.removeAttribute("data-kt-indicator"),
                                                (t.disabled = !1),
                                                Swal.fire({ text: msg.message, icon: "success", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } }).then(
                                                    function (t) {
                                                        t.isConfirmed && (e.reset(), s.reset());
                                                    }
                                                );
                                        }, 1500)
                                    }
                                    else{
                                        t.removeAttribute("data-kt-indicator"),
                                        (t.disabled = !1),
                                        Swal.fire({
                                            text: msg.message,
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: { confirmButton: "btn btn-primary" },
                                        });
                                    }
                                    }
                                })                               
                                  )
                                : Swal.fire({
                                      text: "Sorry, looks like there are some errors detected, please try again.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: { confirmButton: "btn btn-primary" },
                                  });
                        });
                }),
                e.querySelector('input[name="password"]').addEventListener("input", function () {
                    // this.value.length > 0 && a.updateFieldStatus("password", "NotValidated");
                });
        },
    };
})();

var KTSigninGeneral = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    // Handle form
    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {					
					'email': {
                        validators: {
							notEmpty: {
								message: 'Email address is required'
							},
                            emailAddress: {
								message: 'The value is not a valid email address'
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
                        rowSelector: '.fv-row'
                    })
				}
			}
		);		

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
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }),
                    $.ajax({
                        type: "POST",
                        url: base_path+'/login',
                        data: $('#kt_sign_in_form').serialize(),
                        dataType: "json",
                        success: function(msg) {
                            if(msg.status=='true')
                            {
                                
                                
                    
                                // Simulate ajax request
                                setTimeout(function() {
                                    // Hide loading indication
                                    submitButton.removeAttribute('data-kt-indicator');
                    
                                    // Enable button
                                    submitButton.disabled = false;
                    
                                    // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                                    Swal.fire({
                                        text: "You have successfully logged in!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then(function (result) {
                                        if (result.isConfirmed) { 
                                            window.location.href=base_path+'/event'
                                        }
                                    });
                                }, 2000);
                            }
                        else{
                            submitButton.removeAttribute('data-kt-indicator');
                    
                                    // Enable button
                                    submitButton.disabled = false;
                    
                            Swal.fire({
                                text: msg.message,
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: { confirmButton: "btn btn-primary" },
                            })
                        }
                        }
                    })   						
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
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');
            
            handleForm();
        }
    };
}();

KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
});
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});
