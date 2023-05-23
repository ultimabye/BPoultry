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
                        <th>Total Billed</th>
                        <th>Amount Paid</th>
                        <th>Amount Due</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>Rs. {{ $item->getTotalBilled() }}</td>
                            <td>Rs. {{ $item->getAmountPaid() }}</td>
                            <td>Rs. {{ $item->getAmountDue() }}</td>
                            
                            @if ($item->getAmountDue() > 0)
                            <td><button class="btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#paymentModal">Pay</button></td>
                            @endif

                            <td><button class="btn btn-primary "
                                    onclick="window.location='{{ URL::route('view-shop', ['id' => $item->id]) }}'">Edit</button>
                            </td>


                            <!-- Payment Modal -->
                            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" action="{{ url('save-shop-payment') }}">
                                            @csrf
                                            <input name="shop_id" type="hidden" value="{{ $item->id }}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="paymentModalLabel">Submit Payment</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="paymentMethod" class="form-label">Payment
                                                        Method:</label>
                                                    <select class="form-select" id="paymentMethod" name="type">
                                                        <option value="cash">Cash</option>
                                                        <option value="cheque">Cheque</option>
                                                    </select>
                                                </div>
                                                <div id="chequeNumberInput" class="mb-3 d-none">
                                                    <label for="chequeNumber" class="form-label">Cheque Number:</label>
                                                    <input type="text" class="form-control" id="chequeNumber"
                                                        name="cheque_no" placeholder="Enter cheque number">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label">Amount</label>
                                                    <input type="text" class="form-control" id="amount"
                                                        name="amount" placeholder="Enter amount">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="nrations" class="form-label">Enter naration</label>
                                                    <textarea class="form-control" id="naration" name="description" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Payment Modal -->
                        </tr>
                    @empty
                        <li class="list-group-item list-group-item-danger">No shops found.</li>
                    @endforelse
                </tbody>
            </table>


        </div>
    </div>




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
