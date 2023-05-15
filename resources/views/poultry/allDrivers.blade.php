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
            <h1 class="my-4">Drivers Details</h1>
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <button class="btn btn-outline-secondary" type="button" id="search-btn">Search</button>
                </div>
              </div>
              
            </div>
            
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Contact No</th>
                  <th>CNIC</th>
                  <th>License Number</th>
                  <th>Route Number</th>
                  <th>Route Name</th>
                  <th>Shops</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>John Doe</td>
                  <td>555-1234</td>
                  <td>1234567890123</td>
                  <td>123456</td>
                  <td>ABC-123</td>
                  <td>Main Street</td>
                  <td><ul>
                    <li>Shop 1</li>
                    <li>Shop 2</li>
                  </ul></td>
                  <td><button type="button" class="btn btn-primary">Edit</button></td>
                </tr>
                <tr>
                  <td>Jane Smith</td>
                  <td>555-5678</td>
                  <td>9876543210987</td>
                  <td>654321</td>
                  <td>XYZ-789</td>
                  <td>Second Avenue</td>
                  <td><ul>
                    <li>Shop 1</li>
                    <li>Shop 2</li>
                  </ul></td>
                  <td><button type="button" class="btn btn-primary">Edit</button></td>
                </tr>
              </tbody>
            </table>
            
              
        </div>
    </div>
</body>

</html>
