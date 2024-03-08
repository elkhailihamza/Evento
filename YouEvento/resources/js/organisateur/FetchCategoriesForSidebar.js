$(document).ready(function () {
    $("#getCategories").on("click", getCategories);
});

var sent = new Map;

function getCategories() {

    if (sent.has('true')) {
        return;
    }

    $.ajax({
        url: "/categories/get",
        type: "GET",
        success: function (data) {
            sent.set('true');
            $('#selectCategoryForSidebar').html(data);
        },
        error: function (error) {
            console.log(error);
        },
    });
}