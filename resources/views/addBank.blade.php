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
        <div class="container">
            <h1 class="my-4">Enter Account Details</h1>
            <form method="post" action="{{ url('save-new-bank-account') }}">
                @csrf
                <div class="mb-3">
                    <label for="bankName" class="form-label">Account Title</label>
                    <input type="text" class="form-control" id="bankName" name="account_title"
                        placeholder="Enter bank name" value="{{ old('account_title') }}">
                </div>
                <div class="mb-3">
                    <label for="bankLocation" class="form-label">Bank & Branch</label>
                    <input type="text" class="form-control" id="bankLocation" name="bank_name"
                        placeholder="Enter bank location" value="{{ old('bank_name') }}">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Current Balance</label>
                    <input type="number" class="form-control" id="amount" name="balance"
                        value="{{ old('balance') }}" placeholder="Enter amount">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</body>

</html>
