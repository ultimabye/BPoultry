<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contracters</title>
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
        <h1 class="my-4">Contractors Details</h1>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Shops</th>
                    <th>Total Amount</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jane Smith</td>
                    <td>9876543210</td>
                    <td>2</td>
                    <td>100.00</td>
                    
                    <td><button class="btn btn-primary " onclick="editeContractor()" >Edit</button></td>
                    <td><button class="btn btn-primary " onclick="payModal()" >Pay</button></td>
                  </tr>
                  <!-- Add more rows as needed -->
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
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
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
