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
        <h1>Add Sale</h1>
        <form method="post" action="{{ url('save-new-sale') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Product Name</label>
                        <select name="product_id" onchange="showQuantity(this.value)" id="purchase" class=" form-select purchase">
                            <option disable selected>--select product--</option>
                            @foreach ($products as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="customer-name" class="form-label">Customer Name</label>
                        <select name="customer_id" id="customer" class="form-select customer">
                            <option disable selected>--select customer--</option>
                            @foreach ($customers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="supplier-name" class="form-label">Supplier Name</label>
                        <select name="supplier_id" id="supplier" class="form-select supplier">
                            <option disable selected>--select supplier--</option>
                            @foreach ($suppliers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sale-amount" class="form-label">Sale Price</label>
                        <input type="number" class="form-control" id="sale-amount" name="sale_price" placeholder="Total Amount ">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="quantity" id="quantity-label" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="mb-3">
                        <label for="sale-discount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="sale-discount" name="discount"
                            placeholder="Enter the discount %">
                    </div>
                    <div class="mb-3">
                        <label for="sale-date" class="form-label">Sale Date</label>
                        <input type="date" class="form-control" id="sale-date">
                    </div>
                    <div class="mb-3">
                        <label for="amount-due" class="form-label">Due Amount</label>
                        <input type="number" class="form-control" id="amount-due" name="amount_due" placeholder="Due Amount">
                    </div>


                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary">Cancel</button>
        </form>

    </div>
</body>

</html>
