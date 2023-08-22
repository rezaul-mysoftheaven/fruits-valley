$(document).ready(function() {
    
    //function for validate First Name
    function validateFirstName() {
        const firstNameInput = $("#firstName");
        const firstNameError = $("#firstNameError");
        const namePattern = /^[A-Za-z .]+$/; // Allow characters, space, and dot
    
        firstNameError.text("");
    
        if (!namePattern.test(firstNameInput.val().trim())) {
            firstNameInput.addClass("is-invalid");
            firstNameError.html("<i class='fas fa-exclamation-circle me-1'></i> Please enter a valid first name, should not contain numbers or special characters.");
        } else {
            firstNameInput.removeClass("is-invalid");
        }
    }

    //function for validate Surname
    function validateSurname() {
        const surNameInput = $("#surName");
        const surNameError = $("#surNameError");
        const namePattern = /^[A-Za-z]+$/; // Only characters are allowed
    
        surNameError.text("");
    
        if (!namePattern.test(surNameInput.val().trim())) {
            surNameInput.addClass("is-invalid");
            surNameError.html("<i class='fas fa-exclamation-circle me-1'></i> Surname should only contain letters and not contain any spaces.");
        } else {
            surNameInput.removeClass("is-invalid");
        }
    }

    //function for validate email
    function validateEmail() {
        const emailInput = $("#email");
        const emailError = $("#emailError");
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        emailError.text("");
    
        if (!emailPattern.test(emailInput.val().trim())) {
            emailInput.addClass("is-invalid");
            emailError.html("<i class='fas fa-exclamation-circle me-1'></i> Please enter a valid email address.");
        } else {
            emailInput.removeClass("is-invalid");
        }
    }

    //function for validate phone
    function validatePhone() {
        const phoneInput = $("#phone");
        const phoneError = $("#phoneError");
        const phonePattern = /^(\+?8801[356789]\d{8}|01[356789]\d{8})$/;
    
        phoneError.text("");
    
        if (!phonePattern.test(phoneInput.val().trim())) {
            phoneInput.addClass("is-invalid");
            phoneError.html("<i class='fas fa-exclamation-circle me-1'></i> Please enter a valid phone number for Bangladesh.");
        } else {
            phoneInput.removeClass("is-invalid");
        }
    }

    //function for validate password
    function validatePassword() {
        const passwordInput = $("#password");
        const passwordError = $("#passwordError");
        const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@#$%^&+=!])(?!.*\s)[A-Za-z\d@#$%^&+=!]{8,}$/;
        // At least 8 characters, one letter, and one number required
    
        passwordError.text("");
    
        if (!passwordPattern.test(passwordInput.val())) {
            passwordInput.addClass("is-invalid");
            passwordError.html("<i class='fas fa-exclamation-circle me-1'></i> Password must be at least 8 characters and contain at least one letter and one number.");
        } else {
            passwordInput.removeClass("is-invalid");
        }
    }

    //function for validate confirm password
    function validateConfirmPassword() {
        const passwordInput = $("#password");
        const cpasswordInput = $("#cpassword");
        const cpasswordError = $("#conPasswordError");
    
        cpasswordError.text("");
    
        if (passwordInput.val() !== cpasswordInput.val()) {
            cpasswordInput.addClass("is-invalid");
            cpasswordError.html("<i class='fas fa-exclamation-circle me-1'></i> Passwords do not match.");
        } else {
            cpasswordInput.removeClass("is-invalid");
        }
    }

    // Attach event listeners to trigger validation when the inputs lose focus
    $("#firstName").blur(validateFirstName);
    $("#surName").blur(validateSurname);
    $("#email").blur(validateEmail);
    $("#phone").blur(validatePhone);
    $("#password").blur(validatePassword);
    $("#cpassword").blur(validateConfirmPassword);

    // Add form submission event handler
    $("#regiForm").submit(function(event) {
        // Perform all validation checks before submitting the form
        validateFirstName();
        validateSurname();
        validateEmail();
        validatePhone();
        validatePassword();
        validateConfirmPassword();

        // Prevent form submission if any validation errors
        if ($(".is-invalid").length > 0) {
            event.preventDefault();
        }
    });
});
