$(document).ready(function() {

    $(".submit-button").click(function() {

        var fd = new FormData();
        var files = $("#image_input")[0].files[0]
        fd.append('file', files); // 'file' retrives data from $_FILES['file']

        caption = $('#caption').val();
        fd.append('caption', caption);

        $.ajax({
            type: "POST",
            url: "/upload",
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