  $(document).ready(function() {
    // Check if supplier column is filled completely
    $("#selectSupplier, #selectProduct, #productQuantity, #productAmountPerUnit, #commissionAmount, #supplierShippingCharges").on('change keyup', function() {
      if ($("#selectSupplier").val() != "" && $("#selectProduct").val() != "" && $("#productQuantity").val() != "" && $("#productAmountPerUnit").val() != "" && $("#commissionAmount").val() != "" && $("#supplierShippingCharges").val() != "") {
        // Enable customer column
        $("#selectCustomer, #productName, #productSaleAmount, #discountPercentage, #customerShippingCharges, #customerSubtotalLabel, #customerShippingChargesLabel, #customerTotalLabel").prop('disabled', false);
      }
    });
  });
  



  



