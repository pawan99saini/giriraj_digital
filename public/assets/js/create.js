var KTCreate = function() {
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
					'name': {
                        validators: {
							notEmpty: {
								message: 'Event name is required'
							},
                            Maxlength:{
                                message:'30 character is allowed'
                            }
                           
						}
					},
                    'recurrence_type': {
                        validators: {
                            notEmpty: {
                                message: 'Recurrence type is required'
                            }
                        }
                    },
                    'start_date': {
                        validators: {
                            notEmpty: {
                                message: 'Start date is required'
                            },
                            
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
                        url: base_path+'/event',
                        data: $('#new_event_form').serialize(),
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
                                        text: msg.message,
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
            form = document.querySelector('#new_event_form');
            submitButton = document.querySelector('#new_ticket_submit');
            
            handleForm();
        }
    };
}();


KTUtil.onDOMContentLoaded(function () {
    KTCreate.init();
});