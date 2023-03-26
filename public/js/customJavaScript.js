function onLoad() {
    $("#section-sales").hide();
    $("#section-addData").hide();
    $("#section-show").hide();
    $("#sectionLogout").hide();
}
$(document).ready(function () {
    $("#selectSales").click(function () {
        $("#section-sales").show();
        $("#section-addData").hide();
        $("#section-show").hide();
        $("#sectionLogout").hide();
    });
    $("#selectAddData").click(function () {
        $("#section-sales").hide();
        $("#section-addData").show();
        $("#section-show").hide();
        $("#sectionLogout").hide();
    });
    $("#selectReports").click(function () {
        $("#section-sales").hide();
        $("#section-addData").hide();
        $("#section-show").show();
        $("#sectionLogout").hide();
    });

    $("#selectLogout").click(function () {
        $("#section-sales").hide();
        $("#section-addData").hide();
        $("#section-show").hide();
        $("#sectionLogout").show();
    });
});

function showQuantity(product) {
    document.getElementById("quantity-label").value = product;
}
