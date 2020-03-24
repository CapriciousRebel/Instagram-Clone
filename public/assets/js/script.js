$(document).ready(function() {
    $(".submit-button").click(function() {

        var username = $(this).siblings("#username").val();
        var password = $(this).siblings("#password").val();

        $.ajax({
            url: "/login",
            type: "GET",
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                var warning_txt = document.createElement("h3");
                warning_txt.innerHTML = "Invalid username or password!";
                warning_txt.classList.add("warning");

                $('.segway').remove();
                if (!$('.warning').html()) {

                    $('.warning').append(warning_txt);
                }


            }
        });
    });

});