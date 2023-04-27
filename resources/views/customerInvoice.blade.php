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
                <p><strong>Customer Name:</strong> {{ $purchase->sale->customer->name }}</p>
                <p><strong>Voucher No:</strong> {{ $purchase->sale_id }}</p>
            </div>
            <div class="col-6">
                <p class="float-right"><strong>Date:</strong> {{ date('m/d/Y', $purchase->date) }}</p>
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
                    <td>{{ $purchase->product->name }}</td>
                    <td>{{ $purchase->sale->quantity }} x Rs. {{ $purchase->sale->price_per_unit }}</td>
                    <td>Rs.
                        {{ (($purchase->sale->price_per_unit * $purchase->sale->quantity) / 100) * $purchase->sale->discount }}
                    </td>
                    <td>Rs. {{ $purchase->sale->price_per_unit * $purchase->sale->quantity }}</td>
                </tr>

            </tbody>
        </table>

        <div class="row mt-3">
            <div class="col-8">
                <p><strong>Discount Rate:</strong> {{ $purchase->sale->discount }}%</p>
            </div>
            <div class="col-4">
                <table class="table mt-3">
                    <tbody>
                        <tr>
                            <td><strong>Subtotal:</strong></td>
                            <td>Rs. {{ $purchase->sale->price_per_unit * $purchase->sale->quantity }}</td>
                        </tr>
                        <tr>
                            <td><strong>Shipping Charges:</strong></td>
                            <td> Rs. {{ $purchase->sale->freight_charges }}</td>
                        </tr>
                        <tr>
                            <td><strong>Discount Amount:</strong></td>
                            <td>Rs.
                                {{ (($purchase->sale->price_per_unit * $purchase->sale->quantity) / 100) * $purchase->sale->discount }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Amount Due:</strong></td>
                            <td>Rs. {{ $purchase->sale->amount_due }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
