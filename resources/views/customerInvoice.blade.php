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
    <script type="text/javascript" src="{{ asset('js/newSale.js') }}"></script>


</head>

<body style="margin-bottom: 50px;">
    @include('nav')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Customer Invoice</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <p><strong>Customer Name:</strong> ABC Customer</p>
            </div>
            <div class="col-6">
                <p><strong>Date:</strong> {{ date('m/d/Y', $purchase->date) }}</p>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>Rs. {{ $purchase->price_per_unit * $purchase->quantity }}</td>
                </tr>
                
            </tbody>
        </table>
        <div class="row mt-3">
            <div class="col-9">
                <p><strong>Discount Rate:</strong> 5%</p>
                <p><strong>Shipping Charges:</strong> $50.00</p>
            </div>
            <div class="col-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><strong>Subtotal:</strong></td>
                            <td>$1000.00</td>
                        </tr>
                        <tr>
                            <td><strong>Discount Amount:</strong></td>
                            <td>$50.00</td>
                        </tr>
                        <tr>
                            <td><strong>Total Amount:</strong></td>
                            <td>$1000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
