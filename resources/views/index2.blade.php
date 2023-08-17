<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B. Poultry</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>

<body>
    @include('nav')

    <body>

        <div class="container">
            <div class="row mb-3 mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bismillah Poultry Feeds</h5>
                            <p class="card-text">
                                Address: Chak # 36 N. B., 20 KM Kandiwal Road, Sargodha<br>
                                Phone: 0316 7772034<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Collection Last 24 Hours</h5>
                            <p class="card-text">{{ $data->totalToday }} KG</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title">Collection (Yesterday 4pm - Today 4pm)</h5>
                                </div>
                                <div class="col-2">
                                    <a class="btn-primary text-decoration-none" href="/allCollections">See All</a>
                                </div>
                            </div>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Shop</th>
                                        <th>Driver</th>
                                        <th>Quantity (KGs)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data->todaysCollection as $tCollection)
                                        <tr>
                                            <td>{{ date('D h:i A', strtotime($tCollection->created_at)) }}</td>
                                            <td>{{ $tCollection->shop->name }}</td>
                                            <td>{{ $tCollection->driver->name }}</td>
                                            <td>{{ $tCollection->collection_amount }}</td>

                                        </tr>
                                    @empty
                                        <li class="">No data found.</li>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class="card-title">Monthly collection</h5>
                                </div>
                                <div class="col-3">

                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Vehicle No.</th>
                                        <th>Route</th>
                                        <th>No. of Shops</th>
                                        <th>Collection</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data->drivers as $driver)
                                        <tr>
                                            <td>{{ $driver->vehicle_no }}</td>
                                            <td>{{ $driver->route_name }}</td>
                                            <td>{{ $driver->noOfShopsCollectedFrom() }}</td>
                                            <td>{{ $driver->totalCollectionInCurrentMonth() }}</td>

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
        </div>

    </body>

    <!-- Payment Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ url('save-todays-rate') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Update Today's Rate</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount (PKR)</label>
                            <input type="text" class="form-control" id="amount" name="amount"
                                placeholder="Enter amount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Payment Modal -->

    <script>
        setTimeout(function() {
            location.reload();
        }, 30000);
    </script>

</html>
