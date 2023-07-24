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
        <h1 class="my-4">Contractors</h1>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Shops</th>
                        <th>Total Billed</th>
                        <th>Amount Paid</th>
                        <th>Amount Due</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>

                                @forelse($item->shops as $shop)
                                    <li class="list-group-item">{{ $shop->name }}</li>


                                @empty
                                    <li class="list-group-item">No shops found.</li>
                                @endforelse

                            </td>

                            <td>Rs. {{ number_format($item->getTotalBilled(), 2) }}</td>
                            <td>Rs. {{ number_format($item->getAmountPaid(), 2) }}</td>
                            <td>Rs. {{ number_format($item->getAmountDue(), 2) }}</td>

                          
                            <td><button class="btn" data-bs-toggle="modal"
                                    data-bs-target="#paymentModal{{ $item->id }}"><i
                                        class="fa-solid fa-dollar-sign"></i></button></td>

                            <td><a href="{{ URL::route('view-contractor', ['id' => $item->id]) }}" class="btn"><i
                                        class="fa-solid fa-pen-to-square"></i></a></td>


                            <!-- Payment Modal -->
                            <div class="modal fade" id="paymentModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="paymentModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post" action="{{ url('save-contractor-payment') }}">
                                            @csrf
                                            <input name="contractor_id" type="hidden" value="{{ $item->id }}">
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
                                                        <option value="online">Online</option>
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
                                                    <label for="date" class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="date"
                                                        name="date" placeholder="Select Date">
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
                        <li class="list-group-item">No contractors found.</li>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

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
