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
            appendCategories(data[0].categories);
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function createHTMLOption(category) {
    return `<option value="${category.id}">${category.category_name}</option>`;
}

function appendCategories(categories) {
    if (categories.length > 0) {
        var htmlOption = categories.map(createHTMLOption).join('');
        $("#selectCategory").append(htmlOption);
    }
}
