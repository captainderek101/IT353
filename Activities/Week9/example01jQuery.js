$(document).ready(function() {
    $("h1").html("Be Happy!");
    var $p = "<p>Some text goes here</p>";
    $("#main").append($p);
    $("button").on("click", function(button) {
        $("button").html("You clicked");
        // $("button").css("background-color", "red");
        // $("button").css("font-size", "30pt");
        $("button").css({"background-color": "red", "font-size": "30pt"});
    })
});