<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B Poultry</title>
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
            <form method="post" action="{{ url('update-collection') }}">
                @csrf
                <input name="id" type="hidden" value="{{ $item->id }}">
                <div class="mb-3">
                    <label for="time" class="form-label">Time</label>
                    <input type="text" class="form-control" disabled id="time" name="time"
                        value="{{ date('d/m/y (h:i A) ', strtotime($item->created_at)) }}">
                </div>
                <div class="mb-3">
                    <label for="shop" class="form-label">Shop</label>
                    <input type="text" class="form-control"disabled id="shop" name="shop"
                        value="{{ $item->shop->name }}">
                </div>
                <div class="mb-3">
                    <label for="driver" class="form-label">Driver</label>
                    <input type="text" class="form-control" disabled id="driver" name="driver"
                        value="{{ $item->driver->name }}">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity (KGs)</label>
                    <input type="text" class="form-control" id="quantity" name="collection_amount"
                        value="{{ $item->collection_amount }}">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>



        </div>
    </div>
</body>

</html>
