<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>All Invoices</title>
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
    <div class="container">
        <h2 class="my-4">Invoices Search</h2>
        <div class="input-group mb-3">
            <form>
                <input type="text" id="search" class="form-control" name="search"
                    placeholder="Enter a search term..." value="{{ request('search') }}">
            </form>
            <button class="btn btn-primary" type="submit" id="searchButton">Search</button>
        </div>

        <div class="container">
            <h1>Invoice Records</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Voucher Number</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                    </tr>
                </thead>
                <tbody>
                  
                        <tr>
                           

                            

                        </tr>
                 
                        <li class="list-group-item list-group-item-danger">No payments found.</li>
                   
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
