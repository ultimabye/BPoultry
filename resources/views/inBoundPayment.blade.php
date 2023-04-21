<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Voucher Search</title>
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
        <h1>Payment Form</h1>
        <form action="{{ url('save-inbound-payment') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Voucher No.</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="voucher_no" value="{{ request('search') }}"
                        required>
                </div>

                <label for="customerName" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="customerName" name="customerName"
                        value="{{ $sale->customer->name }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="paymentAmount" class="col-sm-2 col-form-label">Total Due</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="totalDue" value="Rs. {{ $sale->amount_due }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="paymentAmount" class="col-sm-2 col-form-label">Payment Amount</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="paymentAmount" name="amount"
                        required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="bankName" class="col-sm-2 col-form-label">Bank Name</label>
                <div class="col-sm-10">
                    <select class="form-select" id="bankName" name="bank_acc_id" required>
                        <option selected>--select bank--</option>
                        @foreach ($banks as $item)
                            <option value="{{ $item->id }}">{{ $item->account_title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="paymentType" class="col-sm-2 col-form-label">Payment Type</label>
                <div class="col-sm-10">
                    <select class="form-select" id="paymentType" name="type" required>
                        <option value="">Select Payment Type</option>
                        <option value="cash">Cash</option>
                        <option value="cheque">Cheque</option>
                    </select>
                </div>

            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" min="0" class="form-control" id="description" name="description">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 text-right">
                    <button type="submit" class="btn btn-primary">Back</button>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </div>
        </form>
    </div>



</body>

</html>
