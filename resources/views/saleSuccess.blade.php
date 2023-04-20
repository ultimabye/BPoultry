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
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success" role="alert">
                    Your order has been saved successfully!
                </div>
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-md-6">
                <a
                    href="{{ URL::route('invoice', ['order_id' => Session::get('order_id'), 'invoice_type' => 'customer']) }}">
                    <button class="btn btn-primary w-100">Print
                        Customer Invoice</button></a>
            </div>
            <div class="col-md-6">
                <a
                    href="{{ URL::route('invoice', ['order_id' => Session::get('order_id'), 'invoice_type' => 'supplier']) }}">
                    <button class="btn btn-primary w-100">Print Supplier Invoice</button></a>
            </div>
            <br>
            <br>
            <br>
            <div class="col-md-12 mt-3 mt-md-0">
                <button class="btn btn-primary w-100">Print Invoice</button>
            </div>
        </div>
    </div>

</body>

</html>
