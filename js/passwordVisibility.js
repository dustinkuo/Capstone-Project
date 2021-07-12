
var togglePass = document.querySelector('#toggle-pass');
var togglePass2 = document.querySelector('#toggle-pass2');

var passwordLog = document.querySelector('#log-password');
var passwordNew = document.querySelector('#new_password');
var passwordVerifyNew = document.querySelector('#verifyPass');

togglePass.addEventListener('click', function(e){
    var type = passwordLog.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordLog.setAttribute('type', type);

    this.classList.toggle('fa-eye-slash');
});

togglePass.addEventListener('click', function(e){
    var type = passwordNew.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordNew.setAttribute('type', type);

    this.classList.toggle('fa-eye-slash');
});

togglePass2.addEventListener('click', function(e){
    var type = passwordVerifyNew.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordVerifyNew.setAttribute('type', type);

    this.classList.toggle('fa-eye-slash');
});

