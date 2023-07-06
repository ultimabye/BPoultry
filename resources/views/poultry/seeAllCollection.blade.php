<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Update Contractor</title>
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
            <div class="row">
                <div class="col-md-12 card pb-2">
                    <h1 class="my-4">All Collection</h1>
                    <div class="d-flex justify-content-end mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="btn btn-primary" type="button">Search</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Vehicle No.</th>
                                <th>Route</th>
                                <th>No. of Shops</th>
                                <th>Collection</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>XYZ789</td>
                                <td>Route 2</td>
                                <td>3</td>
                                <td>$300</td>
                                <td>
                                    <button class="btn" onclick="window.location='updateCollection'">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                                        <i class="fa-sharp fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>

<!-- Delete Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

</html>
