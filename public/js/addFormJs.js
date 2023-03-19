



$(document).ready(function () {
    $("#addSupplier").click(function () {
        $("#selectionAddSupplier").show();
        $("#selectionAddCustomer").hide();
        $("#seletionAddExpences").hide();
    });
    $("#addCustomer").click(function () {
        $("#selectionAddSupplier").hide();
        $("#selectionAddCustomer").show();
        $("#seletionAddExpences").hide();
    });
    $("#addExpences").click(function () {
        $("#selectionAddSupplier").hide();
        $("#selectionAddCustomer").hide();
        $("#seletionAddExpences").show();
    });

});
