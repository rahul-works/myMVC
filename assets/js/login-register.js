/*
 *
 * login-register modal
 * Autor: Creative Tim
 * Web-autor: creative.tim
 * Web script: http://creative-tim.com
 * 
 */
function showRegisterForm() {
    $('.loginBox').fadeOut('fast', function() {
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast', function() {
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Register with');
    });
    $('.error').removeClass('alert alert-danger').html('');

}

function showLoginForm() {
    $('#loginModal .registerBox').fadeOut('fast', function() {
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast', function() {
            $('.login-footer').fadeIn('fast');
        });

        $('.modal-title').html('Login with');
    });
    $('.error').removeClass('alert alert-danger').html('');
}

function openLoginModal() {
    showLoginForm();
    setTimeout(function() {
        $('#loginModal').modal('show');
    }, 230);

}

function openRegisterModal() {
    showRegisterForm();
    setTimeout(function() {
        $('#loginModal').modal('show');
    }, 230);

}

function loginAjax() {
    $.get("/user/record", { email: $('#email').val(), password: $("#password").val() }, function(data) {
        data = JSON.parse(data);
        if (data.length) {
            window.location.replace("/home");
        } else {
            shakeModal();
        }
    });

    /*   Simulate error message from the server   */
    shakeModal();
}

function shakeModal() {
    $('#loginModal .modal-dialog').addClass('shake');
    $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
    $('input[type="password"]').val('');
    setTimeout(function() {
        $('#loginModal .modal-dialog').removeClass('shake');
    }, 1000);
}

function signupAjax() {
    if ($("#password_signup").val() !== $("#password_confirmation").val()) {
        shakeModal();
    }
    // email check 
    if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test($('#email_signup').val())) {
        shakeModal();
    }
    console.log('user - > signup');
    $.post("/user/signup", { email: $('#email_signup').val(), password: $("#password_signup").val() }, function(data) {
        data = JSON.parse(data);
        if (data === "already_existed") {
            $('.error').addClass('alert alert-danger').html("Email id is been used");
        } else if (data === "inserted") {
            $('.error').removeClass('alert-danger').addClass('alert alert-success').html("Inserted");
        } else if (data === "active_user") {
            $('.error').removeClass('alert-danger').addClass('alert alert-success').html("Pleaase check " + $('#email_signup').val() + ' to active your account');
        } else {
            shakeModal();
        }
    });
}