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
    @include('nav')
        <div class="container mt-5">
            <h1>Purchases Report</h1>
            <div class="row mb-3">
              <div class="col-md-3">
                <label for="from-date">From:</label>
                <input type="date" class="form-control" id="from-date">
              </div>
              <div class="col-md-3">
                <label for="to-date">To:</label>
                <input type="date" class="form-control" id="to-date">
              </div>
              <div class="col-md-3">
                <label for="supplier-filter">Supplier:</label>
                <select class="form-select" id="supplier-filter">
                  <option value="">All Suppliers</option>
                  <!-- List of suppliers -->
                </select>
              </div>
              <div class="col-md-3">
                <br>
                <button type="button" class="btn btn-primary" id="filter-btn">Filter</button>
                <button type="button" class="btn btn-secondary" id="clear-btn">Clear</button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Product</th>
                    <th>Supplier</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Freight Charges</th>
                    <th>Total Amount</th>
                  </tr>
                </thead>
                <tbody id="purchases-table-body">
                  <!-- Purchase records will be added dynamically here -->
                </tbody>
              </table>
            </div>
            <div class="row mt-3">
              <div class="col-md-12 text-end">
                <button type="button" class="btn btn-secondary" id="print-btn">Print</button>
               
              </div>
            </div>
          </div>
</body>

</html>
