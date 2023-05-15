<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B. Poultry</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>
<body>
    @include('nav')
    <body>
        <div class="container mt-4">
          <div class="row">
            <div class="col-md-3">
              <a href="allSales" class="btn btn-primary btn-lg d-flex justify-content-between align-items-center">
                <div>
                  <h2>All Sales</h2>
                  <p class="lead mb-0">500</p>
                </div>
                <span><i class="fa-solid fa-cart-shopping-fast"></i></span>
              </a>
            </div>
            <div class="col-md-3">
              <a href="allPurchases" class="btn btn-success btn-lg d-flex justify-content-between align-items-center">
                <div>
                  <h2>All Purchases</h2>
                  <p class="lead mb-0">1000</p>
                </div>
                <span ></span>
              </a>
            </div>
            <div class="col-md-3">
              <a href="allProducts" class="btn btn-secondary btn-lg d-flex justify-content-between align-items-center">
                <div>
                  <h2>All Products</h2>
                  <p class="lead mb-0">250</p>
                </div>
                <span><i class="fa-solid fa-user"></i></span>
              </a>
            </div>
            
            <div class="col-md-3">
              <a href="allSuppliers" class="btn btn-danger btn-lg d-flex justify-content-between align-items-center">
                <div>
                  <h2>All Suppliers</h2>
                  <p class="lead mb-0">50</p>
                </div>
                <span></span>
              </a>
            </div>
            <div class="col-md-3 mt-3">
              <a href="allCustomers" class="btn btn-warning btn-lg d-flex justify-content-between align-items-center">
                <div>
                  <h2>All Customers</h2>
                  <p class="lead mb-0">$10,000</p>
                </div>
                <span ></span>
              </a>
            </div>
          </div>
        </div>

</body>

</html>
