window.onload = function(){
let signinBtn = document.querySelector(".signinBtn");
let signupBtn = document.querySelector(".signupBtn");
let body = document.querySelector("body");

signupBtn.onclick = function () {
  body.classList.add("slide");
};
signinBtn.onclick = function () {
  body.classList.remove("slide");
};


$(document).ready(function() {
    var validateInput = $('input.validate');
    
    function validateInputs() {
        var password = $('#pass').val(),
            conf = $('#conf').val(),
            all_pass = true;
            
        var uppercase = password.match(/[A-Z]/),
            number = password.match(/[0-9]/);

        if (password.length < 8) {
            $('.password_length').removeClass('complete');
            all_pass = false;
        } else $('.password_length').addClass('complete');

        if (uppercase) $('.password_uppercase').addClass('complete');
        else {
            $('.password_uppercase').removeClass('complete');
            all_pass = false;
        }
        
        if (number) $('.password_number').addClass('complete');
        else {
            $('.password_number').removeClass('complete');
            all_pass = false
        }


        if (password == conf && password != '') $('.password_match').addClass('complete');
        else {
            $('.password_match').removeClass('complete')
            all_pass = false;
        }
        document.getElementById("InscriptionBtn").disabled = !all_pass;
    }
    validateInput.each(validateInputs).on('keyup', validateInputs);
    document.getElementById("test").disabled = false;
    
    function showPassword() {
        if(validateInput.attr('type') === 'password') {
            validateInput.attr('type', 'text');
        }
        else if(validateInput.attr('type') === 'text') {
            console.log('else');
            validateInput.attr('type', 'password');
        }
    }
    $('.togglePassword').on('click', showPassword);
});
}