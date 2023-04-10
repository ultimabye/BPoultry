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
      <div class="container">
        <h1 class="my-4">Enter Bank</h1>
        <form>
          <div class="mb-3">
            <label for="bankName" class="form-label">Bank Name</label>
            <input type="text" class="form-control" id="bankName" placeholder="Enter bank name">
          </div>
          <div class="mb-3">
            <label for="bankLocation" class="form-label">Bank Location</label>
            <input type="text" class="form-control" id="bankLocation" placeholder="Enter bank location">
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" placeholder="Enter amount">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
</body>
</html>