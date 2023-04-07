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

</head>

<body>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h2>AD Group</h2>
                    <p>123 Main Street</p>
                    <p>Anytown, USA 12345</p>
                    <p>(123) 456-7890</p>
                  </div>
                  <div class="col-md-6 text-end">
                    <h3>Purchase Receipt</h3>
                    <p>Date: 7 April 2023</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <h4>Product Details</h4>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Product A</td>
                          <td>2</td>
                        </tr>
                        <tr>
                          <td>Product B</td>
                          <td>1</td>
                        </tr>
                        <tr>
                          <td>Product C</td>
                          <td>4</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <h4>Supplier Information</h4>
                    <p>Supplier Name: ABC Supplier</p>
                    <p>Address: 456 First Street</p>
                    <p>Anytown, USA 12345</p>
                    <p>(555) 555-5555</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <h4>Freight  Charges</h4>
                    <p>2000</p>
                  </div>
                  <div class="col-md-6">
                    <h4>Summary</h4>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td>Subtotal</td>
                          <td>3000</td>
                        </tr>
                        <tr>
                          <td>Due Amount</td>
                          <td>2000</td>
                        </tr>
                        <tr>
                          <td>Total Amount</td>
                          <td>40000</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
