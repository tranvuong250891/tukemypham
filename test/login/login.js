var check = true;
var showRegister = document.querySelector('#show-register');
var formRegister = document.querySelector('#register');
var showLogin = document.querySelector('#select-form-login');
var showSigup = document.querySelector('#select-form-sign-up');
var showForgotPass = document.querySelector('#select-form-forgot-pass');
// console.log(showLogin, showSigup, formRegister, showForgotPass);
var showContainer = function(elShow) {

    let form = document.querySelector(elShow);

    if (form) {
        if (check) {
            form.style.display = "block";
            check = false;

        } else {
            form.style.display = "none";
            check = true;

        }

    }
};


showRegister.onclick = function() {
    formRegister.style.display = 'block';
    // document.querySelector('body').style.opacity = 0.5;
};
var closeForm = function(elForm) {
    let form = document.querySelector(elForm);
    if (form) {
        let close = form.querySelector('.close');
        close.onclick = function() {
            form.style.display = 'none';
        }
        window.onclick = function(e) {

            if (e.target == form) {
                form.style.display = 'none';
            };
        }

    }
}


closeForm('#register');



showLogin.onclick = function() {
    showLogin.classList.add('hover-button');
    showSigup.classList.remove('hover-button');
    formRegister.querySelector('#form-login').style.display = 'block';
    formRegister.querySelector('#form-forgot-pass').style.display = 'none';
    formRegister.querySelector('#form-sign-up').style.display = 'none';
}
showSigup.onclick = function() {
    showLogin.classList.remove('hover-button');
    showSigup.classList.add('hover-button');
    formRegister.querySelector('#form-login').style.display = 'none';
    formRegister.querySelector('#form-forgot-pass').style.display = 'none';
    formRegister.querySelector('#form-sign-up').style.display = 'block';
}
showForgotPass.onclick = function() {
    formRegister.querySelector('#form-login').style.display = 'none';
    formRegister.querySelector('#form-forgot-pass').style.display = 'block';
    formRegister.querySelector('#form-sign-up').style.display = 'none';
}

var focusInput = function(el) {
    let formGroup = document.querySelector(el);

    let input = formGroup.querySelector('input');
    console.log(formGroup, input);
    input.onfocus = function() {

        formGroup.style.border = "1px solid #0062cc";

    }

}
var input = Array.from(document.querySelectorAll('input'));
input.forEach(index => {
    if (index.parentElement.getAttribute('name') === 'form-group') {
        index.onfocus = function() {
            index.parentElement.style.color = '#0062cc';
            index.style.color = 'white';
            index.style.borderColor = '#0062cc';
        }
    }
})