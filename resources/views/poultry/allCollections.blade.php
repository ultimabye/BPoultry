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
                    <h1 class="my-4">All Collections</h1>
                    <div class="d-flex justify-content-center mb-3">
                        <form>
                            <div class="input-group">
                                <input type="text" id="search" class="form-control" name="search"
                                    placeholder="Find by driver or shop..." value="{{ request('search') }}">

                            </div>
                        </form>

                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Shop</th>
                                <th>Driver</th>
                                <th>Quantity (KGs)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($allCollections as $tCollection)
                                <tr>
                                    <td>{{ date('d/m/y (h:i A) ', strtotime($tCollection->created_at)) }}</td>
                                    <td>{{ $tCollection->shop->name }}</td>
                                    <td>{{ $tCollection->driver->name }}</td>
                                    <td>{{ $tCollection->collection_amount }}</td>
                                    <td>
                                        <button class="btn"
                                            onclick="window.location='{{ URL::route('view-collection', ['id' => $tCollection->id]) }}'">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn" data-bs-toggle="modal"
                                            data-bs-target="#deleteConfirmationModal{{ $tCollection->id }}">
                                            <i class="fa-sharp fa-solid fa-trash"></i>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteConfirmationModal{{ $tCollection->id }}"
                                            tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete
                                                            Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this item?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="window.location='{{ URL::route('delete-collection', ['id' => $tCollection->id]) }}'">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <li class="">No data found.</li>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>


</html>
