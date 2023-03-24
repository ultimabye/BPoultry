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
    <h1>Add Product</h1>
    <form>
        <div class="mb-3">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="productName" placeholder="Enter product name" required>
        </div>
        <div class="mb-3">
          <label for="productQuantity" class="form-label">Product Quantity</label>
          <input type="number" class="form-control" id="productQuantity" placeholder="Enter product quantity" required>
        </div>
        <div class="mb-3">
          <label for="supplier" class="form-label">Supplier</label>
          <input type="text" class="form-control" id="supplier" placeholder="Enter supplier" required>
        </div>
        <div class="mb-3">
          <label for="retailPrice" class="form-label">Retail Price</label>
          <input type="number" class="form-control" id="retailPrice" placeholder="Enter retail price" required>
        </div>
        <div class="mb-3">
          <label for="salePrice" class="form-label">Sale Price</label>
          <input type="number" class="form-control" id="salePrice" placeholder="Enter sale price" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary">Cancel</button>
      </form>
      
</div>
</body>
</html>
