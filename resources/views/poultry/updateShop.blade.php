<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Update Shop</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>
    @include('cdn')
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
        <div class="container card pb-2">
            <h1 class="my-4">Update Shop</h1>

            <form method="post" action="{{ url('update-shop') }}">
                @csrf
                <input name="id" type="hidden" value="{{ $item->id }}">
                <div class="mb-3">
                    <label for="shop-name" class="form-label">Shop Name</label>
                    <input type="text" class="form-control" id="shop-name" name="name"
                        placeholder="Enter shop name" value="{{ $item->name }}">
                </div>
                <div class="mb-3">
                    <label for="shop-address" class="form-label">Shop Address</label>
                    <textarea class="form-control" id="shop-address" name="address" placeholder="Enter shop address">{{ $item->address }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</body>

</html>
