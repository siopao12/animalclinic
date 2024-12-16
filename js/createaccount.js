document.getElementById('toggleSignupPassword').addEventListener('click', function () {
    const input = document.getElementById('passwordone'); // Corrected to match the new ID
    const icon = this.querySelector('i');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
});



// Toggle visibility for Password
document.getElementById('toggleCreatePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('Thirdpassword'); // Corrected to match the new ID
    const passwordIcon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.remove('bi-eye');
        passwordIcon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordIcon.classList.remove('bi-eye-slash');
        passwordIcon.classList.add('bi-eye');
    }
});


// Toggle visibility for Confirm Password
document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    const confirmPasswordInput = document.getElementById('confirmPassword'); // Correct ID
    const confirmPasswordIcon = this.querySelector('i');
    
    if (confirmPasswordInput.type === 'password') {
        confirmPasswordInput.type = 'text';
        confirmPasswordIcon.classList.remove('bi-eye');
        confirmPasswordIcon.classList.add('bi-eye-slash');
    } else {
        confirmPasswordInput.type = 'password';
        confirmPasswordIcon.classList.remove('bi-eye-slash');
        confirmPasswordIcon.classList.add('bi-eye');
    }
});


// managing the required field and checking the password if its match
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('createAccountForm');
        const password = document.getElementById('Thirdpassword');
        const confirmPassword = document.getElementById('confirmPassword');

        form.addEventListener('submit', function (event) {
            // Check if the form is valid
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            // Check if passwords match
            if (password.value !== confirmPassword.value) {
                event.preventDefault();
                event.stopPropagation();
                confirmPassword.setCustomValidity("Passwords do not match");
                confirmPassword.classList.add('is-invalid');
            } else {
                confirmPassword.setCustomValidity(""); // Clear error
                confirmPassword.classList.remove('is-invalid');
            }

            form.classList.add('was-validated');
        });

        // Reset error message on input
        confirmPassword.addEventListener('input', function () {
            if (password.value === confirmPassword.value) {
                confirmPassword.setCustomValidity("");
                confirmPassword.classList.remove('is-invalid');
            }
        });
    });


