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
        <h1>Available Stock</h1>

        <div class="container">
            <div class="row mb-3">
                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>Filter by Supplier</option>
                        <option value="1">Supplier 1</option>
                        <option value="2">Supplier 2</option>
                        <option value="3">Supplier 3</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>Filter by Price Range</option>
                        <option value="1">Less than $50</option>
                        <option value="2">$50 - $100</option>
                        <option value="3">More than $100</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search by Product Name">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Available Stock</th>
                            <th>Supplier</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->available_stock }}</td>
                                <td>{{ $product->supplier->name }}</td>
                                <td>Rs. {{ $product->unit_price }}</td>

                            </tr>
                        @empty
                            <li class="list-group-item list-group-item-danger">No products found.</li>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
