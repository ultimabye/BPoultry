<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contracters</title>
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
        <h1 class="my-4">Shops Details</h1>
        <div class="container">

        <table class="table table-hover">
          <thead>
            <tr>
              <th>Shop Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr onclick="window.location='shopDetails'">
              <td>Shop A</td>
              <td>123-456-7890</td>
              <td>123 Main St</td>
              <td>$100.00</td>
            </tr>
            <tr onclick="window.location='shopDetails'">
              <td>Shop B</td>
              <td>987-654-3210</td>
              <td>456 Elm St</td>
              <td>$150.00</td>
            </tr>
            <!-- Add more table rows as needed -->
          </tbody>
        </table>
        </div>
      </div>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    </div>
    
</body>

</html>
