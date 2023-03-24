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
    <div class="container mt-5">



<div class="container mt-5">
    <h1>Add Expenses</h1>
    <form>
      <div class="mb-3">
        <label for="expence-name" class="form-label">Expence Name</label>
        <input type="text" class="form-control" id="expence-name" placeholder="Enter expence Title">
      </div>
      <div class="mb-3">
        <label for="expence-amount" class="form-label">Expence Amount</label>
        <input type="number" class="form-control" id="amount" placeholder="Enter Amount">
      </div>
      <div class="mb-3">
        <label for="expence-date" class="form-label">Date</label>
        <input type="text" class="form-control" id="date" placeholder="Select date">
      </div>
      <div class="mb-3">
        <label for="expence-detail" class="form-label">Expence detail</label>
        <textarea type="text" class="form-control" id="expence-detail" rows="3" placeholder="Enter description"></textarea>
      </div>
      
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-secondary">Cancel</button>
    </form>
  </div>
    </div>
</body>
</html>