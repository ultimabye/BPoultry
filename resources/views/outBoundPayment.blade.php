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
    <div class="container">
        <h1>Payment Form</h1>
        <form action="#" method="post">
            <div class="row mb-3">
                <label for="supplierName" class="col-sm-2 col-form-label">Supplier Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="supplierName" name="supplierName" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="paymentAmount" class="col-sm-2 col-form-label">Payment Amount</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="paymentAmount" name="paymentAmount" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="bankName" class="col-sm-2 col-form-label">Bank Name</label>
                <div class="col-sm-10">
                    <select class="form-select" id="bankName" name="bankName" required>
                        <option value="">Select Bank Name</option>
                        <option value="bank1">Bank 1</option>
                        <option value="bank2">Bank 2</option>
                        <option value="bank3">Bank 3</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="paymentType" class="col-sm-2 col-form-label">Payment Type</label>
                <div class="col-sm-10">
                    <select class="form-select" id="paymentType" name="paymentType" required>
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