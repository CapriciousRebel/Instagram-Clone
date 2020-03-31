$(document).ready(function() {

    one = $('#one');
    two = $('#two');
    trends = $("#trends");

    two.css("color", "blue");

    trends.hover().css("cursor", "pointer");
    trends.click(function() {

        two.attr("flag", "0");
        two.css("color", "black");
        one.attr("flag", "1");
        one.css("color", "blue");

    });

});