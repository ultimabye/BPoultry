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
    @if (session('status'))
        @if (session('status') === 'success')
            <div class="alert alert-success">
                {{ session('status-message') }}
            </div>
        @else
            <div class="alert alert-danger">
                {{ session('status-message') }}
            </div>
        @endif
    @endif
    <div class="container mt-5">
        <h1>Add Product</h1>
        <form method="post" action="{{ url('save-new-purchase') }}">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="name"
                    placeholder="Enter product name" required>
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Product Quantity</label>
                <input type="number" class="form-control" id="productQuantity" name="quantity"
                    placeholder="Enter product quantity" required>
            </div>
            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier" class="supplier">
                    <option disable selected>--select supplier--</option>
                    @foreach ($suppliers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="retailPrice" class="form-label">Purchase Price</label>
                <input type="number" class="form-control" id="retailPrice" name="purchase_price"
                    placeholder="Enter retail price" required>
            </div>
            <div class="mb-3">
                <label for="salePrice" class="form-label">Amount Due</label>
                <input type="number" class="form-control" id="salePrice" name="amount_due"
                    placeholder="Enter sale price" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary">Cancel</button>
        </form>

    </div>
</body>

</html>
