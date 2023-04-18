<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Voucher Search</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>
<body>
    @include('nav')
    <div class="container">
      <div class="row">
          <div class="col-12">
              <h1>Customer Payment Voucher</h1>
          </div>
      </div>
      <div class="row mt-3">
          <div class="col-6">
              <p><strong>Customer Name:</strong> </p>
              <p><strong>Voucher No:</strong> 01</p>
          </div>
          <div class="col-6">
              <p class="float-right"><strong>Date:</strong> </p>
          </div>
      </div>
      <table class="table mt-3">
          <thead>
              <tr>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Discount Amount</th>
                  <th>Subtotal</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Feed 1</td>
                  <td>40000</td>
                  <td>Rs.2500 </td>
                  <td>200000</td>
              </tr>
  
          </tbody>
      </table>
  
      <div class="row mt-3">
          <div class="col-8">
              <p><strong>Discount Rate:</strong>5%</p>
          </div>
          <div class="col-4">
              <table class="table mt-3">
                  <tbody>
                      <tr>
                          <td><strong>Subtotal:</strong></td>
                          <td>200000</td>
                      </tr>
                      <tr>
                          <td><strong>Shipping Charges:</strong></td>
                          <td>400000</td>
                      </tr>
                      <tr>
                          <td><strong>Discount Amount:</strong></td>
                          <td>Rs.
                              20000
                          </td>
                      </tr>
                      <tr>
                          <td><strong>Total Amount:</strong></td>
                          <td>Rs.
                             400000
                          </td>
                      </tr>
                      <tr>
                          <td><strong>Amount Paid:</strong></td>
                          <td>Nill</td>
                      </tr>
                      <tr>
                          <td><strong>Balance Due:</strong></td>
                          <td>Rs. 20000</td>
                      </tr>
                  </tbody>
              </table>
              <button class="btn btn-primary w-100">Pay Amount</button>
          </div>
      </div>
  </div>
  
    
</body>
</html>