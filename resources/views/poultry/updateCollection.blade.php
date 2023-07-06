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
    <div class="container mt-5 mb-5">
        <div class="container card pb-2">
            <h1 class="my-4 ">Update Collection Data</h1>
            <form>
                <div class="mb-3">
                    <label for="vehicleNo" class="form-label">Vehicle No.</label>
                    <input type="text" class="form-control" disabled id="vehicleNo" name="vehicleNo">
                </div>
                <div class="mb-3">
                    <label for="route" class="form-label">Route</label>
                    <input type="text" class="form-control"disabled id="route" name="route">
                </div>
                <div class="mb-3">
                    <label for="numShops" class="form-label">No. of Shops</label>
                    <input type="number" class="form-control" disabled id="numShops" name="numShops">
                </div>
                <div class="mb-3">
                    <label for="collection" class="form-label">Collection</label>
                    <input type="text" class="form-control" id="collection" name="collection">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary">Update</button>
                </div>
            </form>
            
            

        </div>
    </div>
</body>

</html>
