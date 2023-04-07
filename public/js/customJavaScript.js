

// var supplier = $('#purchase option:selected').data('supplier');

$(document).ready(function() {
    $('#quantity, #frate').on('input', function() {
      var quantity = $('#quantity').val();
      //var price = parseFloat($('#products option:selected').attr('data-price'));
      var price = $('#purchase option:selected').data('price');
      var subtotal = quantity * price;
      var frate = parseFloat($('#frate').val());
      if (isNaN(frate)) {
        frate = 0;
      }
      var total = subtotal + frate;
      $('#subtotal').text('Rs' + subtotal.toFixed(2));
      $('#total').text('Rs' + total.toFixed(2));
    });

    $('#purchase').on('change', function() {
      // Get the selected option's supplier
      var supplier = $(this).find('option:selected').data('supplier');
    
      // Set the supplier on the input field
      $('#supplier').val(supplier);
    });



  });


  $(document).ready(function() {
    // Load purchases data and populate the table
    loadPurchasesData();
  
    // Handle filter button click event
    $('#filter-btn').click(function() {
      filterPurchasesData();
    });
  
    // Handle clear button click event
    $('#clear-btn').click(function() {
      clearFilters();
    });
  
    // Handle print button click event
    $('#print-btn').click(function() {
      window.print();
    });
  
    // Handle export to PDF button click event
    $('#pdf-export-btn').click(function() {
      exportToPDF();
    });
  });
  
  function loadPurchasesData() {
    // Dummy data for demonstration purposes
    var purchasesData = [
      {
        date: '2022-03-01',
        product: 'Product A',
        supplier: 'Supplier 1',
        quantity: 10,
        subtotal: 100,
        frate: 20,
        total: 120
      },
      {
        date: '2022-03-02',
        product: 'Product B',
        supplier: 'Supplier 2',
        quantity: 5,
        subtotal: 75,
        frate: 200,
        total: 90
    },{
        date: '2022-03-03',
        product: 'Product C',
        supplier: 'Supplier 1',
        quantity: 8,
        subtotal: 80,
        frate: 10,
        total: 90
        },
        {
        date: '2022-03-04',
        product: 'Product D',
        supplier: 'Supplier 3',
        quantity: 15,
        subtotal: 150,
        frate: 30,
        total: 180
        }
        ];
        // Loop through purchases data and create table rows
var tableRows = '';
for (var i = 0; i < purchasesData.length; i++) {
var purchase = purchasesData[i];
tableRows += '<tr>';
tableRows += '<td>' + purchase.date + '</td>';
tableRows += '<td>' + purchase.product + '</td>';
tableRows += '<td>' + purchase.supplier + '</td>';
tableRows += '<td>' + purchase.quantity + '</td>';
tableRows += '<td>$' + purchase.subtotal.toFixed(2) + '</td>';
tableRows += '<td>$' + purchase.frate.toFixed(2) + '</td>';
tableRows += '<td>$' + purchase.total.toFixed(2) + '</td>';
tableRows += '</tr>';
}

// Add table rows to the table body
$('#purchases-table-body').html(tableRows);
}

function filterPurchasesData() {
var fromDate = $('#from-date').val();
var toDate = $('#to-date').val();
var supplier = $('#supplier-filter').val();

// Dummy code for filtering data
var filteredData = [
{
date: '2022-03-01',
product: 'Product A',
supplier: 'Supplier 1',
quantity: 10,
subtotal: 100,
frate: 20,
total: 120
}
// More filtered data can be added here
];

// Load filtered data and populate the table
var tableRows = '';
for (var i = 0; i < filteredData.length; i++) {
var purchase = filteredData[i];
tableRows += '<tr>';
tableRows += '<td>' + purchase.date + '</td>';
tableRows += '<td>' + purchase.product + '</td>';
tableRows += '<td>' + purchase.supplier + '</td>';
tableRows += '<td>' + purchase.quantity + '</td>';
tableRows += '<td>$' + purchase.subtotal.toFixed(2) + '</td>';
tableRows += '<td>$' + purchase.frate.toFixed(2) + '</td>';
tableRows += '<td>$' + purchase.total.toFixed(2) + '</td>';
tableRows += '</tr>';
}

// Add table rows to the table body
$('#purchases-table-body').html(tableRows);
}

function clearFilters() {
$('#from-date').val('');
$('#to-date').val('');
$('#supplier-filter').val('');
loadPurchasesData();
}



// Set document properties
doc.setProperties({
title: 'Purchases Report'
});

// Add table to the document
doc.autoTable({
head: [['Date', 'Product', 'Supplier', 'Quantity', 'Subtotal', 'Freight Charges', 'Total Amount']],
body: getTableData()
});



// Helper function to get the table data
function getTableData() {
var tableData = [];

// Add table header row
tableData.push(['Date', 'Product', 'Supplier', 'Quantity', 'Subtotal', 'Freight Charges', 'Total Amount']);

// Add table rows
for (var i = 0; i < purchasesData.length; i++) {
var purchase = purchasesData[i];
var rowData = [
purchase.date,
purchase.product,
purchase.supplier,
purchase.quantity,
'$' + purchase.subtotal.toFixed(2),
'$' + purchase.frate.toFixed(2),
'$' + purchase.total.toFixed(2)
];
tableData.push(rowData);
}

return tableData;
}

// Load purchases data on page load
$(document).ready(function() {
loadPurchasesData();
});

// Attach event listeners to filter form elements
$('#filter-form').on('submit', function(e) {
e.preventDefault();
filterPurchasesData();
});

$('#clear-filters-btn').on('click', function() {
clearFilters();
});

// Attach event listener to print button
$('#print-btn').on('click', function() {
window.print();
});


  