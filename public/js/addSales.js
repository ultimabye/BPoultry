$('#purchase').on('change', function() {
    
    // Get the selected option's supplier
    var supplier = $(this).find('option:selected').data('supplier');
   
   
    // Set the supplier on the input field
    $('#supplier').val(supplier);

 
  });

  $(document).ready(function() {
    $('#quantity, #frate, #discount').on('input', function() {
        var select = $('#purchase');
        var price = select.find('option:selected').data('price');
        var quantity = $('#quantity').val();
        var frate = parseFloat($('#frate').val());
        if (isNaN(frate)) {
            frate = 0;
        }
        var subtotal = quantity * price;
        $('#subTotal').val(subtotal);

        var discount = parseFloat($('#discount').val());
        if (isNaN(discount)) {
            discount = 0;
        }
        var discountAmount = (subtotal*discount)/100;
        $('#discount_label').text('Rs: ' + discountAmount.toFixed(2));
        

        var total = (subtotal + frate) - discountAmount ;
        $('#total').text('Rs: ' + total.toFixed(2));

    });
  });



  
  



  



