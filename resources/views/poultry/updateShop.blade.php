<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Shop</title>
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
        <div class="container">
            <h1 class="my-4">Update Shop Details</h1>
            
            <form>
              <div class="mb-3">
                <label for="shop-name" class="form-label">Shop Name</label>
                <input type="text" class="form-control" id="shop-name" name="shop-name" placeholder="Enter shop name">
              </div>
              <div class="mb-3">
                <label for="shop-address" class="form-label">Shop Address</label>
                <textarea class="form-control" id="shop-address" name="shop-address" placeholder="Enter shop address"></textarea>
              </div>
              <div class="mb-3">
                <label for="drivers-list" class="form-label">Drivers List</label>
                <select class="form-select" id="drivers-list" name="drivers-list[]" multiple>
                  <option value="driver-1">Driver 1</option>
                  <option value="driver-2">Driver 2</option>
                  <option value="driver-3">Driver 3</option>
                  <option value="driver-4">Driver 4</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
            
        </div>
    </div>
</body>

</html>