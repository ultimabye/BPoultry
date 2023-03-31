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
        <h1>Add Purchase</h1>
    <form>
        <div class="row">
          <div class="col-md-6">
            <label for="product">Product:</label>
            <select class="form-select" id="product">
              <option selected>Select a product</option>
              <!-- List of products -->
            </select>
            <br>
            <label for="supplier">Supplier:</label>
            <select class="form-select" id="supplier">
              <option selected>Select a supplier</option>
              <!-- List of suppliers -->
            </select>
            <br>
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity">
            <br>
            <label for="subtotal"><b>Subtotal:</b></label>
            <label id="subtotal"><b>Rs 0</b></label>
          </div>
          <div class="col-md-6">
            <label for="frate">Freight charges:</label>
            <input type="number" class="form-control" id="frate">
            <br>
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date">
            <br>
            <label for="total"><b>Total Amount:</b></label>
            <label id="total"><b>Rs 0</b></label>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
          </div>
        </div>
      </form>
    </div>

    
      
      
</body>

</html>
