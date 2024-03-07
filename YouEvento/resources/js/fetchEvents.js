$(document).ready(function () {
    $("#getEvents").on("click", fetchCategories);
});

var fetchedEvents = new Map();

function fetchCategories() {
    if (fetchedEvents.has("true")) {
        return;
    }

    $.ajax({
        url: "/events/get",
        type: "GET",
        success: function (data) {
            fetchedEvents.set("true");
            $('#events').html(data);
        },
        error: function (error) {
            console.log(error);
        },
    });
}