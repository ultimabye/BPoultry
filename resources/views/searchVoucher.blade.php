<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Voucher Search</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>
<body>
    @include('nav')
    <div class="container">
      <h2 class="my-4">Voucher Search</h2>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Enter voucher number..." aria-label="Enter voucher number..." aria-describedby="searchButton">
        <button class="btn btn-primary" type="button" id="searchButton">Search</button>
      </div>
    </div>
</body>
</html>