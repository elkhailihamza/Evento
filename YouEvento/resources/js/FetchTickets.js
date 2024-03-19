$(document).ready(function () {
    $("#getTickets").on("click", fetchTickets);
    $("#selectTickets").on("change", fetchSelect);
});

var fetched = new Map();

function fetchTickets() {
    if (fetched.has("true")) {
        return;
    }

    var event_id = $("#getTickets").attr("data-event-id");
    $.ajax({
        url: "/tickets/get",
        type: "GET",
        data: {
            event_id,
        },
        success: function (data) {
            fetched.set("true");
            $("#selectTickets").html(data);
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function fetchSelect() {
    var ticket = $("#selectTickets").val();
    $.ajax({
        url: "/tickets/info/get",
        type: "GET",
        data: {
            ticket,
        },
        success: function (data) {
            $("#ticketSection").html(data);
            $("#reserve").removeClass("hidden");
        },
        error: function (error) {
            console.log(error);
        },
    });
}
