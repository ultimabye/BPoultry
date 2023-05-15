<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Driver</title>
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
            <h1 class="my-4">Update Driver Details</h1>
            <form>
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="contact" class="form-label">Contact No</label>
                  <input type="tel" class="form-control" id="contact" name="contact" required>
                </div>
                <div class="mb-3">
                  <label for="cnic" class="form-label">CNIC</label>
                  <input type="text" class="form-control" id="cnic" name="cnic" required>
                </div>
                <div class="mb-3">
                  <label for="license" class="form-label">Driver License Number</label>
                  <input type="text" class="form-control" id="license" name="license" >
                </div>
                <div class="mb-3">
                  <label for="route-number" class="form-label">Vehicle Route Number</label>
                  <input type="text" class="form-control" id="route-number" name="route-number" required>
                </div>
                <div class="mb-3">
                  <label for="route-name" class="form-label">Route Name</label>
                  <input type="text" class="form-control" id="route-name" name="route-name" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
              
        </div>
    </div>
</body>

</html>
