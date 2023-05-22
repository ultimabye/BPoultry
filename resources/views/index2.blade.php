<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B. Poultry</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>
<body>
    @include('nav')
    <body>
    
      <div class="container">
        <div class="row mb-3 mt-5">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Company Details</h5>
                <p class="card-text">
                  Company Name: ABC Corporation<br>
                  Address: 123 Main Street, City<br>
                  Phone: (123) 456-7890<br>
                  Email: info@abccorp.com
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Today's Rate</h5>
                <p class="card-text">20</p>

              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Total Collection Today</h5>
                <p class="card-text">200Kg</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Daily Collection</h5>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Header 1</th>
                      <th>Header 2</th>
                      <th>Header 3</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Data 1</td>
                      <td>Data 2</td>
                      <td>Data 3</td>
                    </tr>
                    <!-- Add more rows as needed -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Monthly collection</h5>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Header 1</th>
                      <th>Header 2</th>
                      <th>Header 3</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Data 1</td>
                      <td>Data 2</td>
                      <td>Data 3</td>
                    </tr>
                    <!-- Add more rows as needed -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

</body>

</html>
