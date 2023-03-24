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
      <h1>Customer Form</h1>
      <form>
        <div class="mb-3">
          <label for="customer-name" class="form-label">customer Name</label>
          <input type="text" class="form-control" id="supplier-name" placeholder="Enter customer name">
        </div>
        <div class="mb-3">
          <label for="customer-number" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone-number" placeholder="Enter phone number">
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" rows="3" placeholder="Enter address"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary">Cancel</button>
      </form>
    </div>
</body>

</html>






