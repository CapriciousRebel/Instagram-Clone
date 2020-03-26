$(document).ready(function() {
    $(".submit-button").click(function() {
        var username = $('.input-form').children("#username").val();
        var password = $('.input-form').children("#password").val();

        //var username = $(this).siblings("#username").val();  <--- mistake, this was for when the submit button was inside the form itself
        //var password = $(this).siblings("#password").val();  <--- mistake, this was for when the submit button was inside the form itself

        $.ajax({
            type: "POST",
            url: "/login",
            data: {
                username: username,
                password: password
            },
            success: function(resp) {

                if (resp == "verified") {
                    setTimeout("window.location.href = '' ", 500);
                } else {
                    var warning_txt = document.createElement("h3");
                    warning_txt.innerHTML = "Invalid username or password!";
                    warning_txt.classList.add("warning");

                    $('.segway').remove();
                    if (!$('.warning').html()) {
                        $('.warning').append(warning_txt);

                    }
                }
            }
        });
    });
});