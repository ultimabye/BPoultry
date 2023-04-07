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
    <div class="container mt-5">
        <h1>Add Purchase</h1>
        <form method="post" action="{{ url('save-new-purchase') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="product">Product:</label>
                    <select name="product" id="purchase" class=" form-select purchase">
                        <option disable selected>--select product--</option>
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}" data-price="{{ $item->unit_price }}" data-supplier="{{ $item->supplier->name }}">{{ $item->name}}</option>

                        @endforeach
                    </select>
                    <br>
                    <label for="supplier">Supplier:</label>
                    <input disabled type="text" class="form-control" id="supplier" >
                    <br>
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" id="quantity">
                    <br>
                    <label for="subtotal"><b>Subtotal:</b></label>
                    <label id="subtotal"><b>Rs 0</b></label>
                </div>
                <div class="col-md-6">
                    <label for="frate">Freight charges:</label>
                    <input type="number" class="form-control" name="freight_charges" id="frate">
                    <br>
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" name="date" id="date">
                    <br>
                    <label for="amountDue">Amount Due</label>
                    <input type="number" class="form-control" name="due_amount" id="amountDue">
                    <br>
                    <label for="total"><b>Total Amount:</b></label>
                    <label id="total"><b>Rs 0</b></label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>




</body>

</html>
