<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payments</title>
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
            <h1 class="my-4">Payment Details</h1>

            <div class="container mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Shop/Contractor Name</th>
                            <th>Narration</th>
                            <th>Amount (PKR)</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ date('d/m/y', strtotime($item->entry_date)) }}</td>
                                <td>{{ $item->getBeneficiaryName() }} </td>
                                <td>{{ $item->description }} </td>
                                <td>{{ number_format($item->amount, 2) }}</td>

                                <td><button class="btn" data-bs-toggle="modal"
                                        data-bs-target="#paymentModal{{ $item->id }}"><i
                                            class="fa-solid fa-edit"></i></button></td>
                                            <td><button class="btn" data-bs-toggle="modal"
                                        data-bs-target="#paymentDeleteModal{{ $item->id }}"><i
                                            class="fa-solid fa-trash"></i></button></td>




                                <!-- Payment Modal -->
                                <div class="modal fade" id="paymentModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="paymentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="{{ url('update-payment') }}">
                                                @csrf
                                                <input name="id" type="hidden" value="{{ $item->id }}">
                                                <input name="type" type="hidden" value="{{ $item->getType() }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="paymentModalLabel">Update Payment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">

                                                        <label for="date" class="form-label">Date:
                                                            {{ date('d/m/y', strtotime($item->entry_date)) }} </label>
                                
                                                    </div>
                                                    <div class="mb-3">

                                                        
                                                        <label for="beneficiary" class="form-label">Beneficiary:
                                                            {{ $item->getBeneficiaryName() }} </label>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="amount" class="form-label">Amount</label>
                                                        <input type="text" class="form-control" id="amount"
                                                            name="amount" placeholder="Enter amount"
                                                            value="{{ $item->amount }}">
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

                                 <!-- Payment Delete Modal -->
                                 <div class="modal fade" id="paymentDeleteModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="paymentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="{{ url('delete-payment') }}">
                                                @csrf
                                                <input name="id" type="hidden" value="{{ $item->id }}">
                                                <input name="type" type="hidden" value="{{ $item->getType() }}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="paymentModalLabel">Delete Payment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">

                                                        <label for="date" class="form-label">Date:
                                                            {{ date('d/m/y', strtotime($item->entry_date)) }} </label>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="beneficiary" class="form-label">Beneficiary:
                                                            {{ $item->getBeneficiaryName() }} </label>
                                                    </div>

                                                    <div class="mb-3">
                                                        
                                                        <label for="amount" class="form-label">Amount:
                                                            {{ $item->amount}} </label>
                                                       
                                                    </div>

                                                    <div class="">
                                                        <label for="amount" class="form-label">Are you sure to delete this entry?</label>
                                                       
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
    
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Payment Delete Modal -->
                            </tr>
                        @empty
                            <li class="">No payments found.</li>
                        @endforelse

                    </tbody>
                </table>



                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
</body>


</html>
