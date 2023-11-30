document.getElementById('registerLink').addEventListener('click', function() {
    var registerOffcanvas = new bootstrap.Offcanvas(document.getElementById('registerOffcanvas'));
    registerOffcanvas.toggle();
});

// backdrop false
// document.getElementById('registerLink').addEventListener('click', function() {
//     var registerOffcanvas = new bootstrap.Offcanvas(document.getElementById('registerOffcanvas'));
//     backdrop: false;
//     registerOffcanvas.toggle();

// invis loginpass
var eyeIconLogin = document.getElementById('loginEye');
var passwordInputLogin = document.getElementById('loginPass');
eyeIconLogin.addEventListener('click', function() {
    if (passwordInputLogin.type === 'password') {
        passwordInputLogin.type = 'text';
        eyeIconLogin.src = 'assets/icons8-eye-96 off.png';
        eyeIconLogin.style.transition = 'opacity 0.3s ease';
    } else {
        passwordInputLogin.type = 'password';
        eyeIconLogin.src = 'assets/icons8-eye-96.png'; 
        eyeIconLogin.style.transition = 'opacity 0.3s ease';
    }
});

// invis regpass
const eyeIconReg = document.getElementById('regEye');
const passwordInputReg = document.getElementById('regPass');
const confirmPasswordField = document.getElementById('confirmPassword');

eyeIconReg.addEventListener('click', function() {
    if (passwordInputReg.type === 'password') {
        passwordInputReg.type = 'text';
        confirmPasswordField.type = 'text';
        eyeIconReg.src = 'assets/icons8-eye-96 off.png'
    } else {
        passwordInputReg.type = 'password';
        confirmPasswordField.type = 'password';
        eyeIconReg.src = 'assets/icons8-eye-96.png'
    }
});

// conpass not recognition by pass
const newPassword = document.getElementById('regPass');
const confirmPassword = document.getElementById('confirmPassword');
const passwordMatchMessage = document.getElementById('passwordMatchMessage');

let lastConfirmedPassword = '';

confirmPassword.addEventListener('input', function() {
    if (confirmPassword.value === '') {
        confirmPassword.style.borderColor = '';
        confirmPassword.style.boxShadow = '';
        passwordMatchMessage.style.display = 'none';
    } else if (newPassword.value !== confirmPassword.value && confirmPassword.value !== lastConfirmedPassword) {
        confirmPassword.style.borderColor = 'red';
        confirmPassword.style.boxShadow = '0 0 5px red';
        passwordMatchMessage.style.display = 'block';
    } else {
        confirmPassword.style.borderColor = '';
        confirmPassword.style.boxShadow = '';
        passwordMatchMessage.style.display = 'none';
    }
});
confirmPassword.addEventListener('blur', function() {
    confirmPassword.style.borderColor = '';
    confirmPassword.style.boxShadow = '';
});

const regPass = document.getElementById('regPass');
const submitButton = document.querySelector('button[type="submit"]');

confirmPassword.addEventListener('input', function() {
    if (regPass.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity('Konfirmasi password tidak cocok');
        submitButton.disabled = true;
    } else {
        confirmPassword.setCustomValidity('');
        submitButton.disabled = false;
    }
});