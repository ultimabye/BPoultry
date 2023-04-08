<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ad Group</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/newSale.js') }}"></script>


</head>

<body>
    @include('nav')

    <div class="container mt-5">
   
    <form>
        <div class="row">
          <div class="col">
            <h3>Supplier</h3>
            <div class="mb-3">
              <label for="selectSupplier" class="form-label">Select Supplier</label>
              <select class="form-select" id="selectSupplier" required>
                <option value="">Select Supplier</option>
                <option value="supplier1">Supplier 1</option>
                <option value="supplier2">Supplier 2</option>
                <option value="supplier3">Supplier 3</option>
              </select>
              <div class="invalid-feedback">
                Please select a supplier.
              </div>
            </div>
            <div class="mb-3">
              <label for="selectProduct" class="form-label">Select Product</label>
              <select class="form-select" id="selectProduct" required>
                <option value="">Select Product</option>
                <option value="product1">Product 1</option>
                <option value="product2">Product 2</option>
                <option value="product3">Product 3</option>
              </select>
              <div class="invalid-feedback">
                Please select a product.
              </div>
            </div>
            <div class="mb-3">
              <label for="productQuantity" class="form-label">Product Quantity</label>
              <input type="number" class="form-control" id="productQuantity" required>
              <div class="invalid-feedback">
                Please enter product quantity.
              </div>
            </div>
            <div class="mb-3">
              <label for="productAmount" class="form-label">Product Amount per unit</label>
              <input type="number" class="form-control" id="productAmount" required>
              <div class="invalid-feedback">
                Please enter product amount per unit.
              </div>
            </div>
            <div class="mb-3">
              <label for="commissionAmount" class="form-label">Commission Amount in percentage</label>
              <input type="number" class="form-control" id="commissionAmount" required>
              <div class="invalid-feedback">
                Please enter commission amount in percentage.
              </div>
            </div>
            <div class="mb-3">
              <label for="shippingCharges" class="form-label">Shipping Charges</label>
              <input type="number" class="form-control" id="shippingCharges" required>
              <div class="invalid-feedback">
                Please enter shipping charges.
              </div>
            </div>
            <div class="mb-3">
              <label for="subtotalLabel" class="form-label">Sub Total Label</label>
              <input type="text" class="form-control" id="subtotalLabel" >
            </div>
            <div class="mb-3">
              <label for="shippingChargesLabel" class="form-label">Shipping Charges Label</label>
              <input type="text" class="form-control" id="shippingChargesLabel" >
            </div>
            <div class="mb-3">
              <label for="totalLabel" class="form-label">Total Label</label>
              <input type="text" class="form-control" id="totalLabel" >
            </div>
          </div>
          
          <div class="col border-left h-200">
            <h3>Customer</h3>
            <div class="mb-3">
              <label for="selectCustomer" class="form-label">Select Customer</label>
              <select class="form-select" id="selectCustomer" disabled>
                <option value="">Select Customer</option>
                <option value="customer1">Customer 1</option>
                <option value="customer2">Customer 2</option>
                <option value="customer3">Customer 3</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" disabled>
            </div>
            <div class="mb-3">
              <label for="productSaleAmount" class="form-label">Product Sale Amount per unit</label>
              <input type="number" class="form-control" id="productSaleAmount" disabled>
            </div>
            <div class="mb-3">
              <label for="discountPercentage" class="form-label">Discount Percentage</label>
              <input type="number" class="form-control" id="discountPercentage" disabled>
            </div>
            <div class="mb-3">
              <label for="customerShippingCharges" class="form-label">Shipping Charges</label>
              <input type="number" class="form-control" id="customerShippingCharges" disabled>
            </div>
            <div class="mb-3">
              <label for="customerSubtotalLabel" class="form-label">Sub Total Label</label>
              <input type="text" class="form-control" id="customerSubtotalLabel" disabled>
            </div>
            <div class="mb-3">
              <label for="customerShippingChargesLabel" class="form-label">Shipping Charges Label</label>
              <input type="text" class="form-control" id="customerShippingChargesLabel" disabled>
            </div>
            <div class="mb-3">
              <label for="customerTotalLabel" class="form-label">Total Label</label>
              <input type="text" class="form-control" id="customerTotalLabel" disabled>
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="row">
            <div class="col ">
              <button class="btn btn-primary w-100 ">Supplier Invoice</button>
            </div>
            <div class="col ">
              <button class="btn btn-primary w-100 ">Customer Invoice</button>
            </div>
            <div class="col">
              <button class="btn btn-primary w-100">Invoice</button>
            </div>
          </div>
        
       
      </form>
    </div>
</body>

</html>
