<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shops</title>
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
            <h1 class="my-4">Shops Details</h1>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <button class="btn btn-outline-secondary" type="button" id="search-btn">Search</button>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Total Amount</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>TBI</td>
                            <td><button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#paymentModal">Pay</button></td>
                            <td><button class="btn btn-primary " onclick="editeShop()" >Edit</button></td>

                        </tr>
                    @empty
                        <li class="list-group-item list-group-item-danger">No shops found.</li>
                    @endforelse
                </tbody>
            </table>


        </div>
    </div>
    

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Submit Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="paymentMethod" class="form-label">Payment Method:</label>
            <select class="form-select" id="paymentMethod">
              <option value="cash">Cash</option>
              <option value="cheque">Cheque</option>
            </select>
          </div>
          <div id="chequeNumberInput" class="mb-3 d-none">
            <label for="chequeNumber" class="form-label">Cheque Number:</label>
            <input type="text" class="form-control" id="chequeNumber" placeholder="Enter cheque number">
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" id="amount" placeholder="Enter amount">
          </div>
          
          <div class="mb-3">
              <label for="nrations" class="form-label">Enter naration</label>
              <textarea class="form-control" id="naration" rows="3"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
    <!-- End Payment Modal -->
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Handle dropdown change event
        document.getElementById('paymentMethod').addEventListener('change', function() {
          var chequeNumberInput = document.getElementById('chequeNumberInput');
          if (this.value === 'cheque') {
            chequeNumberInput.classList.remove('d-none');
          } else {
            chequeNumberInput.classList.add('d-none');
          }
        });
      </script>
</body>


</html>

