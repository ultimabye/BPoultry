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
                <h2>Supplier</h2>
                <p>Supplier Name: {{ $purchase->product->supplier->name }}</p>
                <p>Voucher Number: {{ $purchase->id }}</p>
                <p>Invoice Date: {{ date('m/d/Y', $purchase->date) }} </p>
                <p>Amount : Rs.{{ $purchase->amount_due }}</p>
                <a class="btn btn-primary" href="{{ url('/invoice/' . $purchase->id . '&supplier') }}"
                    target="_blank">Print Invoice</a>
                <a class="btn btn-primary" href="{{ url('/voucher/out/' . $purchase->id) }}" type="button" target="_blank">Pay
                    Amount</a>

            </div>
            <div class="col-md-6">
                <h2>Customer</h2>
                <p>Customer Name: {{ $purchase->sale->customer->name }}</p>
                <p>Voucher Number: {{ $purchase->sale->id }}</p>
                <p>Invoice Date: {{ date('m/d/Y', $purchase->sale->date) }}</p>
                <p>Amount: Rs.{{ $purchase->sale->amount_due }}</p>
                <a class="btn btn-primary" href="{{ url('/invoice/' . $purchase->id . '&customer') }}"
                    target="_blank">Print Invoice</a>
                <a class="btn btn-primary" href="{{ url('/voucher/in/' . $purchase->sale->id) }}"
                    type="button" target="_blank">Receive Payment</a>
            </div>
        </div>

    </div>


</body>


</html>
