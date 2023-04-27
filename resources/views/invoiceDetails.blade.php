<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>All Invoices</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>

<body>
    @include('nav')
    <div class="container py-5">
      <h1 class="text-center mb-5">Invoice Details</h1>
      <div class="row">
        <div class="col-md-6">
          <h2>Supplier Invoice Details</h2>
          <p>Supplier Name: XYZ Corporation</p>
          <p>Voucher Number: 12345</p>
          <p>Invoice Date: 2023-04-27</p>
          <p>Amount : 90000</p>
          
        </div>
        <div class="col-md-6">
          <h2>Customer Invoice Details</h2>
          <p>Customer Name: ABC Inc.</p>
          <p>Voucher Number: 67890</p>
          <p>Invoice Date: 2023-04-25</p>
          <p>Amount: 90000</p>
        </div>
      </div>
      <div class="d-grid gap-2 col-md-6 mx-auto mt-5">
        <a class="btn btn-primary" href="{{ url('/supplierInvoice') }}" target="_blank">Print Supplier Invoice</a>
        <a class="btn btn-primary" href="{{ url('/customerInvoice') }}" type="button">Print Customer Invoice</a>
        <a class="btn btn-primary" href="{{ url('/inBoundPayment') }}" type="button">Receive Payment</a>
        <a class="btn btn-primary" href="{{ url('/outBoundPayment') }}" type="button">Pay Amount</a>
      </div>
    </div>

    
</body>


</html>
