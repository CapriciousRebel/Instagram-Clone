$(document).ready(function() {

    $(".submit-button").click(function() {

        var username = $('.input-form').children("#username").val();
        var name = $('.input-form').children("#name").val();
        var password = $('.input-form').children("#password").val();
        var email_phone = $('.input-form').children("#email_phone").val();


        $.ajax({
            type: "PUT",
            url: "/update",
            data: {
                username: username,
                name: name,
                password: password,
                email_phone: email_phone
            },
            success: function(resp) {
                $("#usernameShow").html("@" + username);
            }
        });
    });
});