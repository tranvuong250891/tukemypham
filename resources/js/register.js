$(document).ready(function() {
    // alert(1);
});
// console.log(1);
$("#signup_email").blur(function() {

    $("#messa_email").html('');
    var email = $(this).val();
    $.post(BASEURL + '/ajax/show/', { email: email }, function(data) {
        var mess = JSON.parse(data);
        // alert(data);
        $("#messa_email").html(mess.email);

    });

});

$("#signup_pass").blur(function() {

    $("#messa_pass").html('');
    $("#messa_repass").html('');
    var pass = $(this).val();
    var repass = $('#signup_repass').val();

    $.post(BASEURL + '/ajax/show/', { pass: pass, repass: repass }, function(data) {
        var mess = JSON.parse(data);

        // alert(JSON.parse(data));
        $("#messa_pass").html(mess.pass);
        $("#messa_repass").html(mess.repass);

    });

});


$("#signup_repass").blur(function() {
    // alert(1);
    var repass = $(this).val();
    var pass = $("#signup_pass").val();
    $("#messa_repass").html('');
    $("#messa_pass").html('');

    $.post(BASEURL + '/ajax/show/', { repass: repass, pass: pass, }, function(data) {
        var mess = JSON.parse(data);
        $("#messa_pass").html(mess.pass);
        $("#messa_repass").html(mess.repass);


    });

});

$("#signup_btn").click(function() {

    var email = $("#signup_email").val();
    var pass = $("#signup_pass").val();
    var repass = $("#signup_repass").val();
    $.ajax({
        url: BASEURL + '/ajax/show/',
        type: 'POST',
        data: {
            pass: pass,
            repass: repass,
            email: email,
        },
        success: function(data, status) {

            // alert(data);

            var mess = JSON.parse(data);
            $("#messa_pass").html(mess.pass);
            $("#messa_repass").html(mess.repass);
            $("#messa_email").html(mess.email);
            if (mess.status == "thanh cong") {
                alert("dang ki thanh cong");
                location.reload();
            }

        }

    });

});

$("#login_btn").click(function() {

    var email = $("#login_email").val();
    var pass = $("#login_pass").val();
    $('#error_login_pass').html('');
    $('#error_login_email').html('');
    $.ajax({
        url: BASEURL + '/ajax/index/',
        type: 'POST',
        data: {
            pass: pass,
            email: email,
        },
        success: function(data, status) {
            // alert(data);
            var mess = JSON.parse(data);
            if (data == 1) {
                alert("dang nhap thanh cong");
                location.reload();
            }
            $('#error_login_pass').html(mess.pass);
            $('#error_login_email').html(mess.email);
        }

    });

});