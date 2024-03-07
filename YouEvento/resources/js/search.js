$(document).ready(function () {
    $("#search").on("click", search);
});

function search() {
    var searchValue = $("#searchInput").val();
    var sortBy = $("#sortBy").val() ?? 1;

    $.ajax({
        url: "/events/search",
        type: "GET",
        data: {
            search: searchValue,
            sortBy: sortBy,
        },
        success: function (data) {
            $('#searchSection').html(data);
            // appendEvents(data[0].events);
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function appendEvents(events) {
    var eventHTML = events.map(createEventHtml).join("");
    $("#searchSection").append(eventHTML);
}

function createEventHtml(event) {
    var date = new Date(event.created_at);
    var formattedDate = date.toLocaleString();
    var eventHtml = `
        <div class="w-[300px] rounded-md border p-2">
            <div class="flex justify-center mb-3">
                <img src="storage/${event.cover}" alt="'${event.title}' Img Cover" onerror="$(this).attr('src', 'storage/images/thumbnail.png')">
            </div>
            <div>
                <h2 class="truncate">Title: ${event.title}</h2>
                <p class="truncate">Created: ${formattedDate}</p>
            </div>
        </div>
    `;
    return eventHtml;
}
