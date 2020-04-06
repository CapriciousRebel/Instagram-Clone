$(document).ready(function() {
    $('.post-like').hover().css("cursor", "pointer");

    $("input").focus(function() {
        $(this).css("border", "none");
    });

    $('.post-like').click(function() {

        post_id = $(this).attr("id");
        id = "#" + post_id.toString();

        current_likes = Number($(id).siblings(".likes").children(".like-count").html());

        if ($(id).attr("src") == "/assets/images/heart_activated.png") {
            $(id).attr("src", "/assets/images/heart.png");
            $(id).siblings(".likes").children(".like-count").html(current_likes - 1);
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
                    $(id).siblings(".likes").children(".like-count").html(current_likes + 1);
                }
            }
        })
    });

    $('.submit-button').click(function(e) {
        e.preventDefault();

        post_id = $(this).parent().parent().siblings("img").attr("id");
        comment = $(this).siblings("input").val();
        username = $(this).siblings(".username-value").val()
        user_comment = $(this).parent().siblings(".comment.user");

        $.ajax({
            type: "POST",
            url: "/comment",
            data: {
                post_id: post_id,
                comment: comment
            },
            success: function(resp) {
                user_comment.children("h2").html(username);
                user_comment.children("h4").html(comment);
            }

        })


    });
});