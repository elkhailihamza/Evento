$(document).ready(function () {
    $("#modalEdit").on("click", getCategories);
});

var fetched = new Map;

function getCategories() {

    if (fetched.has('true')) {
        return;
    }

    var event = $('#modalEdit').attr('data-post-id');

    $.ajax({
        url: "/categories/get",
        type: "GET",
        data: {
            event,
        },
        success: function (data) {
            fetched.set('true');
            $('#selectCategoryForEditModal').html(data);
        },
        error: function (error) {
            console.log(error);
        },
    });
}