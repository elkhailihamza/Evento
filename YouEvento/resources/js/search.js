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
        },
        error: function (error) {
            console.log(error);
        },
    });
};