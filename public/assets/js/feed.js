$(document).ready(function() {
    $('.post-like').hover().css("cursor", "pointer");
    $('.post-like').click(function() {
        post_id = $(this).attr("id");
        $(this).attr("src", "/assets/images/heart_activated.png");

        $.ajax({
            type: "POST",
            url: "/like",
            data: {
                post_id: post_id
            },
            success: function(resp) {
                console.log(resp);
            }
        })
    });

});