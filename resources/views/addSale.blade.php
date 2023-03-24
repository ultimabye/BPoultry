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
        <h1>Add Sale</h1>
        <form>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product-name" placeholder="Enter product name">
                    </div>
                    <div class="mb-3">
                        <label for="customer-name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="customer-name" placeholder="Enter customer name">
                    </div>
                    <div class="mb-3">
                        <label for="supplier-name" class="form-label">Supplier Name</label>
                        <input type="text" class="form-control" id="supplier-name" placeholder="Enter supplier name">
                    </div>
                    <div class="mb-3">
                        <label for="sale-amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="sale-amount" placeholder="Total Amount ">
                    </div>
                </div>
                
                <div class="col">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Enter quantity">
                    </div>
                    <div class="mb-3">
                        <label for="sale-discount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="sale-discount"  placeholder="Enter the discount %">
                    </div>
                    <div class="mb-3">
                        <label for="sale-date" class="form-label">Sale Date</label>
                        <input type="date" class="form-control" id="sale-date">
                    </div>
                    <div class="mb-3">
                        <label for="payment-method" class="form-label">Payment Method</label>
                        <select class="form-select" id="payment-method">
                            <option value="cash">Cash</option>
                            <option value="due">Due</option>
                        </select>
                    </div>
                    
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary">Cancel</button>
        </form>
    
    </div>
</body>

</html>