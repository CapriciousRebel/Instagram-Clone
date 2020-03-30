$(document).ready(function() {
    var follow_button = $('.follow-button');
    follow_button.hover().css("cursor", "pointer");

    follow_button.click(function() {
        follow_user_id = $(this).attr("id");
        id = "#" + follow_user_id.toString();


        $.ajax({
            type: "PUT",
            url: "/follow",
            data: {
                follow_user_id: follow_user_id
            },
            success: function(resp) {
                if (resp == "followed!") {
                    $(id).html("Following");
                } else if (resp == "unfollowed!") {
                    $(id).html("Follow");
                }
            }
        });
    });
});