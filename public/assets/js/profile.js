$(document).ready(function() {
    $("#profile-pic").hover().css('cursor', 'pointer');
    $("#profile-pic").click(function() {
        $('.edit').css({
            "display": "flex"
        });
        $('.user').css({
            "display": "none"
        })
    });


    $(".submit-button").click(function() {

        var fd = new FormData();
        var files = $("#image_input")[0].files[0]
        fd.append('file', files); // 'file' retrives data from $_FILES['file']


        $.ajax({
            type: "POST",
            url: "/upload_profile",
            data: fd,
            contentType: false,
            processData: false,
            success: function(resp) {

                console.log(resp);

                if (resp != 0) {
                    $('#image').attr('src', resp);
                    $('.preview').show();
                } else {
                    alert("File not uploaded!");
                }
            }
        });
    });
});