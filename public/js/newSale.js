
$('#selectProduct').on('change', function() {
    
  // Get the selected option's product
  var product = $(this).find('option:selected').data('product');
 
 
  // Set the cProductName on the input field
  $('#cProductName').val(product);


});

  $(document).ready(function() {
    // Check if supplier column is filled completely
    $("#selectSupplier, #selectProduct, #productQuantity, #productAmount, #commissionAmount, #shippingCharges").on('change keyup', function() {
      if ($("#selectSupplier").val() != "" && $("#selectProduct").val() != "" && $("#productQuantity").val() != "" && $("#productAmountPerUnit").val() != "" && $("#commissionAmount").val() != "" && $("#shippingCharges").val() != "") {
        // Enable customer column
        $("#selectCustomer, #cProductName, #cProductSaleAmount,#cProductQuantity, #discountPercentage, #customerShippingCharges, #customerSubtotal, #cDiscountAmount, #customerTotal").prop('disabled', false);
      }
    });
  });

  $(document).ready(function() {
    $('#productQuantity, #commissionAmount, #shippingCharges, #productAmount').on('input', function() {

      var quantity = $('#productQuantity').val();
      var perUnitPrice = $('#productAmount').val();
      var lessPercent = $('#commissionAmount').val();
      var shippingCost = $('#shippingCharges').val();
      var subTotal = (quantity * perUnitPrice);
      var discount = (subTotal*lessPercent)/100;
      
      var total = subTotal - ((subTotal*lessPercent)/100) - shippingCost;


      $('#subtotalLabel').val(subTotal);
      $('#discountAmount').val(discount);
      $('#totalAmount').val(total);
      $('#cProductSaleAmount').val(perUnitPrice);
      $('#cProductQuantity').val(quantity);
       
    });
  });

  $(document).ready(function() {
    $('#discountPercentage, #customerShippingCharges').on('input', function() {

      var cQuantity =  parseFloat($('#cProductQuantity').val());
      var cPricePer = parseFloat($('#cProductSaleAmount').val());
      var cLess = parseFloat($('#discountPercentage').val());
      var cShipping = parseFloat($('#customerShippingCharges').val());

      var cSubTotal = (cQuantity * cPricePer);
      var cDiscount = (cSubTotal*cLess)/100;

      var cTotal = cSubTotal - ((cSubTotal*cLess)/100) + cShipping;


      $('#customerSubtotal').val(cSubTotal);
      $('#cDiscountAmount').val(cDiscount);
      $('#customerTotal').val(cTotal);



      
       
    });
  });


  


  // $(document).ready(function() {
  //   // Check if supplier column is filled completely
  //   $("#selectSupplier, #selectProduct, #productQuantity, #productAmountPerUnit, #commissionAmount, #shippingCharges").on('change keyDown', function() {
  //     if ($("#selectSupplier").val() != "" && $("#selectProduct").val() != "" && $("#productQuantity").val() != "" && $("#productAmountPerUnit").val() != "" && $("#commissionAmount").val() != "" && $("#shippingCharges").val() != "") {
  //       // Enable customer column
  //       $("#selectCustomer, #productName, #productSaleAmount, #discountPercentage, #customerShippingCharges, #customerSubtotalLabel, #customerShippingChargesLabel, #customerTotalLabel").prop('disabled', true);
  //     }
  //   });
  // });
  



  



