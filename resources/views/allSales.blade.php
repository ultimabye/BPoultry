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
                    <button type="button" class="btn btn-success" onclick="printSaleReport()">Print Sales
                        Report</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sale Date</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Customer</th>
                            <th>Discount (%)</th>
                            <th>Supplier</th>
                            <th>Unit Price (Rs.)</th>
                            <th>Sub Total</th>
                            <th>Freight</th>
                            <th>Total</th>
                            <th>Amount Due</th>

                        </tr>
                    </thead>
                    <tbody>

                        @forelse($sales as $sale)
                            <tr>
                                <td>{{ date('m/d/Y', $sale->date) }}</td>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->discount }}</td>
                                <td>{{ $sale->product->supplier->name }}</td>
                                <td>Rs.{{ $sale->price_per_unit }}</td>
                                <td>Rs.{{ $sale->price_per_unit * $sale->quantity - (($sale->price_per_unit * $sale->quantity) / 100) * $sale->discount }}
                                </td>
                                <td>Rs.{{ $sale->freight_charges }}</td>
                                <td>Rs.
                                    {{ $sale->price_per_unit * $sale->quantity - (($sale->price_per_unit * $sale->quantity) / 100) * $sale->discount + $sale->freight_charges }}
                                </td>
                                <td>Rs. {{ $sale->amount_due }}</td>
                            </tr>





                        @empty
                            <li class="list-group-item list-group-item-danger">No Sales Found.</li>
                        @endforelse

                    </tbody>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Grand Total</th>
                            <th>Total Due</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Rs: {{ $totalAmount }}</th>
                            <th>Rs: {{ $amountDue }}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Amount Received</th>
                            <th></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Rs: {{ $amountReceived }}</th>
                            <th></th>
                        </tr>


                    </thead>
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
