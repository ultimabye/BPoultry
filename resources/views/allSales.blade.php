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
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Customer Name</th>
                            <th>Discount (%)</th>
                            <th>Supplier Name</th>
                            <th>Sale Date</th>
                            <th>Total Amount</th>
                            <th>Amount Due</th>
                        
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($sales as $sale)
                            <tr>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>{{ $sale->customer->name }}</td>
                                <td>{{ $sale->discount }}</td>
                                <td>{{ $sale->supplier->name }}</td>
                                <td></td>
                                <td>Rs. {{ $sale->sale_price }}</td>
                                <td>Rs. {{ $sale->amount_due }}</td>
                              
                            </tr>
                        @empty
                            <li class="list-group-item list-group-item-danger">No Sales Found.</li>
                        @endforelse

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
