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
            fetchedEvents.set('true');
            appendEvents(data[0].events);
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function generateEventHtml(event) {
    var date = new Date(event.created_at);
    var formattedDate = date.toLocaleString();
    var eventHtml = `
        <div class="w-full rounded-md border p-2">
            <div class="mb-3">
                <img src="storage/${event.cover}" alt="'${event.title}' Img Cover">
            </div>
            <div>
                <h2 class="truncate">Title: ${event.title}</h2>
                <p class="truncate">Created: ${formattedDate}</p>
            </div>
        </div>
        <hr>
    `;
    return eventHtml
}

function appendEvents(events) {
    var eventHTML = events.map(generateEventHtml).join('');
    $('#events').append(eventHTML);
}
