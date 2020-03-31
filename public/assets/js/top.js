$(document).ready(function() {

    one = $('#one');
    two = $('#two');
    trends = $("#trends");

    one.css("color", "blue");

    trends.hover().css("cursor", "pointer");
    trends.click(function() {

        one.attr("flag", "0");
        one.css("color", "black");
        two.attr("flag", "1");
        two.css("color", "blue");

    });

});