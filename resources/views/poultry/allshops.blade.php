<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shops</title>
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
            <h1 class="my-4">Shops Details</h1>
            
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
                  <th>Address</th>
                  <th>Drivers</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Shop 1</td>
                  <td>Address 1</td>
                  <td>Driver 1</td>
                  <td><button type="button" class="btn btn-primary">Edit</button></td>

                </tr>
                <tr>
                  <td>Shop 2</td>
                  <td>Address 2</td>
                  <td>Driver 2</td>
                  <td><button type="button" class="btn btn-primary">Edit</button></td>

                </tr>
                <tr>
                  <td>Shop 3</td>
                  <td>Address 3</td>
                  <td>Driver 3</td>
                  <td><button type="button" class="btn btn-primary">Edit</button></td>

                </tr>
                <tr>
                  <td>Shop 4</td>
                  <td>Address 4</td>
                  <td>Driver 4</td>
                  <td><button type="button" class="btn btn-primary">Edit</button></td>
                </tr>
              </tbody>
            </table>
            
              
        </div>
    </div>
</body>

</html>
