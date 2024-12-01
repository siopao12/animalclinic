// Toggle visibility for Password
document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('Thirdpassword'); // Corrected to match the HTML ID
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
