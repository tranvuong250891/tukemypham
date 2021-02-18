{
    var showRegister = document.querySelector('.show-register');
    var formRegister = document.querySelector('#register');
    var showLogin = document.querySelector('#select-form-login');
    var showSigup = document.querySelector('#select-form-sign-up');
    var showForgotPass = document.querySelector('#select-form-forgot-pass');
    let checkFocusPass = true;
    let checkFocusRePass = true;
    let check = true;

    registerNav.onclick = function (e){
        $.ajax({
            type: 'get',
            url : '/destroy',
        })
        // window.location = '/';
        
    }

    let loginUser = function (){
        $.ajax({
            url: '/user',
            type: 'get',
            data: {
                
            },
            success: function(data, status) {
                
                var user = JSON.parse(data);
                // console.log(user);
                if(user) {
                    document.querySelector('.login').style.display = "none";
                    document.querySelector('.logout').style.display = "flex";
                    document.querySelector('.logout span').innerHTML = user.email;
                    // console.log(document.querySelector('.logout span'));
        
                } else if(user = false){
                    
                } 
                
            }
        });
    }

    loginUser();

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

    };
    var closeForm = function(elForm) {
        let form = document.querySelector(elForm);
        if (form) {
            let close = form.querySelector('.close');
            close.onclick = function() {
                form.style.display = 'none';
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

    function styleSuccess(el, mess = '') {

        el.parentElement.style.color = '#0062cc';
        el.parentElement.querySelector('span').innerHTML = mess;
        el.parentElement.querySelector('span').style.color = "#0062cc";
        el.style.color = 'white';
        el.style.borderColor = '#0062cc';

    }
    var input = Array.from(document.querySelectorAll('input'));
    input.forEach(index => {
        if (index.parentElement.getAttribute('name') === 'form-group') {
            index.onfocus = function() {
                styleSuccess(this);


            }
        }
    })

    // REGISTER USER
    var emailLogin = $('#email-login')[0];
    var passLogin = $('#pass-login')[0];
    var btnLogin = $('#btn-login')[0];

    

    emailLogin.onblur = function() {
        checkEmail(this, '/apiuser/register');
    }


    function checkLogin() {
        $.ajax({
            url: '/apiuser/register',
            type: 'post',
            success: function(data) {
                console.log(data);

                let nameEmail = JSON.parse(data);
            //    console.log(data);
                if (data !== 'null') {
                   
                    document.querySelector('.login').style.display = "none";
                    document.querySelector('.logout').style.display = "flex";
                   
                    // document.querySelector('.logout span').innerHTML = nameEmail;
                } else {
                   
                    document.querySelector('.login').style.display = "flex";
                    document.querySelector('.logout').style.display = "none";
                }

            }
        })

    }
    // checkLogin();


    function errorStyle(el, mess) {
        let parentEl = el.parentElement;
        let errorEl = parentEl.querySelector('span');
        let valueEl = el.value;
        errorEl.innerHTML = mess;
        parentEl.style = "color: red";
        el.style = "color: red";
        errorEl.style.color = "red";

    }

    function checkEmail(value, Api = '') {
        let email = value.value;
        $.ajax({
            url: Api,
            type: 'POST',
            data: {

                email: email,
            },
            success: function(data, status) {
                console.log(data);
                var mess = JSON.parse(data);
                if (mess.email == "ban co the su dung email nay") {
                    styleSuccess(value, "bạn có thể sữ dụng email này");
                } else if (!mess.email) {
                    styleSuccess(value, "bạn có thể sữ dụng email này");
                } else {
                    errorStyle(value, mess.email[0]);

                }
            }
        });
    }

    passLogin.onblur = function() {

    }

    function login(email, pass, api) {
        let valuePass = pass.value;
        let valueEmail = email.value;
        $.ajax({
            url: api,
            type: 'POST',
            data: {
                pass: valuePass,
                email: valueEmail,
            },
            success: function(data, status) {
                console.log(data);
                var mess = JSON.parse(data);
                
                if (mess === "success") {
                    alert('Đăng nhập thành công');
                    // document.querySelector('.logout span').innerHTML = mess.email;
                    formRegister.style.display = 'block';
                    checkLogin();
                    location.reload();


                } else {

                    if (mess.pass) {
                        errorStyle(pass, mess.pass);

                    }
                    if (mess.email) {
                        errorStyle(email, mess.email);

                    }
                }

            }

        });

    }
    btnLogin.onclick = function(e) {
        e.preventDefault();
        (login(emailLogin, passLogin, '/apiuser/register'));
    }


    // Sign up
    var checkFocus = false;
    var emailSignUp = $("#email-sign-up")[0];
    var passSignUp = $("#pass-sign-up")[0];
    var rePassSignUp = $("#repass-sign-up")[0];
    var btnSignUp = $("#btn-sign-up")[0];
    emailSignUp.onblur = function() {
        checkEmail(emailSignUp, '/apiuser/login');
    }

    function checkPass(api, pass, rePass = '') {
        let valuePass = pass.value;
        let valueRePass = '';
        if (rePass) {
            let parentRePass = rePass.parentElement;
            let errorRePass = parentRePass.parentElement.querySelector('span');
            valueRePass = rePass.value;
        }
        $.ajax({
            url: api,
            type: 'POST',
            data: {
                pass: valuePass,
                repass: valueRePass,
            },
            success: function(data, status) {
                var mess = JSON.parse(data);

                if (mess.pass && !checkFocusPass) {
                    errorStyle(pass, mess.pass[0]);
                } else {
                    styleSuccess(pass);
                }

                if (mess.repass && !checkFocusRePass) {
                    errorStyle(rePass, mess.repass[0]);
                } else {
                    styleSuccess(rePass);
                }
            }
        });
    }

    passSignUp.onblur = function() {
        checkPass('/apiuser/login', passSignUp, rePassSignUp);
        checkFocusPass = false;


    }

    rePassSignUp.onfocus = function() {
        checkFocusRePass = true;
        styleSuccess(this);

    }

    passSignUp.onfocus = function() {
        checkFocusPass = true;
        styleSuccess(this);
    }
    rePassSignUp.onblur = function() {
        checkPass('/apiuser/login', passSignUp, rePassSignUp);
        checkFocusRePass = false;
    }
    
   
    function signUp(api, email, pass, rePass) {
        let valuePass = pass.value;
        let valueRePass = rePass.value;
        let valueEmail = email.value;

        $.ajax({
            url: api,
            type: 'POST',
            data: {
                email: valueEmail,
                pass: valuePass,
                repass: valueRePass,
            },
            success: function(data, status) {
                console.log(data);
                var mess = JSON.parse(data);
               if (mess.email) {
                    errorStyle(email, mess.email[0]);
               }
                if (mess.pass) {
                    errorStyle(pass, mess.pass[0]);
                }

                if (rePass !== '' && mess.repass) {
                    errorStyle(rePass, mess.repass[0]);
                }
                if (mess == 'success') {
                    alert("Đăng Ký Thành Công");
                    showLogin.classList.add('hover-button');
                    showSigup.classList.remove('hover-button');
                    formRegister.querySelector('#form-login').style.display = 'block';
                    formRegister.querySelector('#form-forgot-pass').style.display = 'none';
                    formRegister.querySelector('#form-sign-up').style.display = 'none';
                    // emailLogin.value = valueEmail;
                }

            }
        });


    }
    btnSignUp.onclick = function(e) {
        e.preventDefault();
        signUp('/apiuser/login', emailSignUp, passSignUp, rePassSignUp);
    }
    

   $

    


}




