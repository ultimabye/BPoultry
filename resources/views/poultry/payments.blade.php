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
                            <th>Shop/Contracter Name</th>
                            <th>Narration</th>
                            <th>Amount</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button class="btn" data-bs-toggle="modal"
                                    data-bs-target="#paymentModal"><i
                                        class="fa-solid fa-edit"></i></button></td>
                                <td><button class="btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"><i
                                        class="fa-solid fa-trash"></i></button></td>
                            </tr>
                        
                    </tbody>
                </table>

                <!-- Payment Modal -->
                <div class="modal fade" id="paymentModal" tabindex="-1"
                    aria-labelledby="paymentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="">
                                @csrf
                                <input name="shop_id" type="hidden" value="">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="paymentModalLabel">Update Payment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                        
                                        
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control" id="amount"
                                            name="amount" placeholder="Enter amount">
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
            
                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
</body>


</html>
