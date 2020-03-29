$(document).ready(function() {
    $('.post-like').hover().css("cursor", "pointer");

    $('.post-like').click(function() {

        post_id = $(this).attr("id");
        id = "#" + post_id.toString();

        if ($(id).attr("src") == "/assets/images/heart_activated.png") {
            $(id).attr("src", "/assets/images/heart.png");
        }

        $.ajax({
            type: "PUT",
            url: "/like",
            data: {
                post_id: post_id
            },
            success: function(resp) {
                if (resp == "liked!") {
                    $(id).attr("src", "/assets/images/heart_activated.png");
                }
            }
        })
    });

});