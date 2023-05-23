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
                        <th>Total Amount</th>
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
                                    <li>{{ $shop->name }}</li>


                                @empty
                                    <li class="list-group-item list-group-item-danger">No shops found.</li>
                                @endforelse

                            </td>
                            <td><button class="btn btn-primary " data-bs-toggle="modal"
                                    data-bs-target="#paymentModal">Pay</button></td>
                            <td><a href="{{ URL::route('view-contractor', ['id' => $item->id]) }}"
                                    class="btn btn-xs btn-info pull-right">Edit</a></td>

                        </tr>
                    @empty
                        <li class="list-group-item list-group-item-danger">No contractors found.</li>
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
                    <h5 class="modal-title" id="paymentModalLabel">Receive Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Check no</label>
                            <input type="text" class="form-control" id="check no" placeholder="Enter check no">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="text" class="form-control" id="amount" placeholder="Enter amount">
                        </div>

                        <div class="mb-3">
                            <label for="nrations" class="form-label">Enter naration</label>
                            <textarea class="form-control" id="naration" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Receive Payment</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Payment Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
