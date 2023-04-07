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
                        <th>Due Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchases as $item)
                        <tr>
                            <td>{{ date('m/d/Y', $item->date) }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->product->supplier->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rs. {{ $item->quantity * $item->product->unit_price }}</td>
                            <td>Rs. {{ $item->freight_charges }}</td>
                            <td>Rs. {{ $item->quantity * $item->product->unit_price + $item->freight_charges }}</td>

                            @if ($item->amount_due)
                                <td>Rs. {{ $item->amount_due }}</td>
                            @else
                                <td>NIL</td>
                            @endif
                        </tr>
                    @empty
                        <li class="list-group-item list-group-item-danger">No Purchase Found.</li>
                    @endforelse
                </tbody>
            </table>
        </div>
        <label for="totalPurchases"><b>Total Purchases:</b></label>
        <label id="totalPurchases"><b>Rs: 0</b></label>
        <div class="row mt-3">
            <div class="col-md-12 text-end">
                <button type="button" class="btn btn-secondary" id="print-btn">Print</button>

            </div>
        </div>
    </div>
</body>

</html>
