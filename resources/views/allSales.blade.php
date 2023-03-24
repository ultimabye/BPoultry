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
    <h1>All Sales</h1>
    <div class="container">
        <div class="row mb-3">
          <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search by Product Name or Customer Name">
          </div>
          <div class="col-md-6 text-end">
            <button type="button" class="btn btn-primary me-2">New Sale</button>
            <button type="button" class="btn btn-success" onclick="printSaleReport()">Print Sales Report</button>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Customer Name</th>
                <th>Discount (%)</th>
                <th>Supplier Name</th>
                <th>Sale Date</th>
                <th>Amount</th>
                <th>Cash or Due</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Product 1</td>
                <td>2</td>
                <td>Customer 1</td>
                <td>5%</td>
                <td>Supplier 1</td>
                <td>2023-03-20</td>
                <td>$90.00</td>
                <td>Cash</td>
                <td>
                  <button type="button" class="btn btn-secondary me-2"><i class="bi bi-pencil"></i> Edit</button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </td>
              </tr>
              <tr>
                <td>Product 2</td>
                <td>3</td>
                <td>Customer 2</td>
                <td>10%</td>
                <td>Supplier 2</td>
                <td>2023-03-22</td>
                <td>$120.00</td>
                <td>Due</td>
                <td>
                  <button type="button" class="btn btn-secondary me-2"><i class="bi bi-pencil"></i> Edit</button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </td>
              </tr>
              <tr>
                <td>Product 3</td>
                <td>1</td>
                <td>Customer 3</td>
                <td>0%</td>
                <td>Supplier 1</td>
                <td>2023-03-23</td>
                <td>$30.00</td>
                <td>Cash</td>
                <td>
                  <button type="button" class="btn btn-secondary me-2"><i class="bi bi-pencil"></i> Edit</button>
                  <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
</div>


<script>
function printSaleReport() {
  window.print();
}
</script>
</body>
</html> 