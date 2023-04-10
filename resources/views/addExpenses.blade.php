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
        <div class="container mt-5">
            <h1>Add Expense</h1>
            <form method="post" action="{{ url('save-new-expense') }}">
                @csrf
                <div class="mb-3">
                    <label for="expence-name" class="form-label">Expense Name</label>
                    <input type="text" class="form-control" id="expence-name" name="name"
                        value="{{ old('name') }}" placeholder="Enter expence Title">
                </div>
                <div class="mb-3">
                    <label for="expence-amount" class="form-label">Expence Amount</label>
                    <input type="number" class="form-control" id="amount" placeholder="Enter Amount" name="amount"
                        value="{{ old('amount') }}">
                </div>
                <div class="mb-3">
                    <label for="expence-date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="Select date" name="date"
                        value="{{ old('date') }}">
                </div>
                <div class="mb-3">
                    <label for="expence-detail" class="form-label">Expence detail</label>
                    <textarea type="text" class="form-control" id="expence-detail" rows="3" name="description"
                        value="{{ old('description') }}" placeholder="Enter description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>
</body>

</html>
