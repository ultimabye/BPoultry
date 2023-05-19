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
            <h1 class="my-4">Enter Contracter Details</h1>

            <form method="post" action="{{ url('save-shop') }}">
                @csrf
                <div class="mb-3">
                    <label for="contracter-name" class="form-label">Contracter Name</label>
                    <input type="text" class="form-control" id="contracter-name" name="contracter_name"
                        placeholder="Enter contracter name">
                </div>
                <div class="mb-3">
                    <label for="contracter-phone" class="form-label">Contracter Phone</label>
                    <input class="form-control" id="contracter-phone" name="contracter_phone" placeholder="Enter contracter phone"></input>
                </div>
                <div class="mb-3">
                    <label for="contracter-address" class="form-label">Contracter Address</label>
                    <textarea class="form-control" id="contracter-address" name="contracter_address" placeholder="Enter contracter address"></textarea>
                </div>

                <div class="card-body">
                    <h1 class="card-title">Shops</h1>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="option1">
                      <label class="form-check-label" for="option1">
                        Option 1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="option2">
                      <label class="form-check-label" for="option2">
                        Option 2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="option3">
                      <label class="form-check-label" for="option3">
                        Option 3
                      </label>
                    </div>
                <div class="mt-5"></div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>
    </div>
</body>

</html>
