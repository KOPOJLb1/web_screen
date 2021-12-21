var login_form = document.getElementById('login_form');
var loginForm_button = document.getElementById('loginForm_button');
var loginForm_button_2 = document.getElementById('loginForm_button_2');
var close_button_1 = document.getElementById('close_login');
var reg_form = document.getElementById('reg_form');
var regForm_button = document.getElementById('regForm_button');
var regForm_button_2 = document.getElementById('regForm_button_2');
var close_button_2 = document.getElementById('close_reg');
var form_login_button = document.getElementById('signupForm-name-input');
var out_button_reg = document.getElementById('out_button_reg');
var mask = document.getElementById('mask');

loginForm_button.onclick = function(){
    modal_login.classList.add('active');
    login_form.classList.add('active');
    modal_reg.classList.remove('active');
    reg_form.classList.remove('active');

}
close_button_1.onclick = function(){
    modal_login.classList.remove('active');
    login_form.classList.remove('active');
}
regForm_button.onclick = function(){
    modal_reg.classList.add('active');
    reg_form.classList.add('active');
    modal_login.classList.remove('active');
    login_form.classList.remove('active');
}
close_button_2.onclick = function(){
    modal_reg.classList.remove('active');
    reg_form.classList.remove('active');
}
loginForm_button_2.onclick = function(){
    modal_login.classList.add('active');
    login_form.classList.add('active');
    modal_reg.classList.remove('active');
    reg_form.classList.remove('active');
}
regForm_button_2.onclick = function(){
    modal_reg.classList.add('active');
    reg_form.classList.add('active');
    modal_login.classList.remove('active');
    login_form.classList.remove('active');
}


