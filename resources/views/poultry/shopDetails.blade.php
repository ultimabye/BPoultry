<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contrattor Details</title>
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
                <div class="col-md-6">
                    <h4>Shop Information</h4>
                    <form>
                        <div class="mb-3">
                            <label for="contractorName" class="form-label">Name:</label>
                            <h4 id="contractorName">{{ $shop->name }}</h4>
                        </div>

                        @if (!is_null($shop->driver))
                            <div class="mb-3">
                                <label for="contractorPhone" class="form-label">Driver:</label>
                                <h4 id="contractorPhone">{{ $shop->driver->name }}</h4>
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="contractorPhone" class="form-label">Phone:</label>
                                <h4 id="contractorPhone">---</h4>
                            </div>
                        @endif



                        <div class="mb-3">
                            <label for="contractorAddress" class="form-label">Address:</label>
                            <h4 id="contractorAddress">{{ $shop->address }}</h4>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-end"> <button type="button" class="btn btn-primary">Print</button></div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Shop Ledger</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Particulars</th>
                                <th>Rate (PKR)</th>
                                <th>Weight (KG)</th>
                                <th>Amount (PKR)</th>
                                <th>Credit (PKR)</th>
                                <th>Balance (PKR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ date('d/m/y', strtotime($item->created_at)) }}</td>

                                    @if ($item->isCollection())
                                        <td></td>
                                        <td>{{ $item->rate->amount }}</td>
                                        <td>{{ $item->collection_amount }}</td>
                                        <td>{{ $item->rate->amount * $item->collection_amount }}</td>
                                        <td></td>
                                        <td>{{ $shop->getAmountDueTill($item->created_at) }}</td>
                                    @else
                                        <td>{{ $item->description }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ $shop->getAmountDueTill($item->created_at) }}</td>
                                    @endif
                                    {{-- <td>{{ $tCollection->shop->name }}</td>
                                <td>{{ $tCollection->driver->name }}</td>
                                <td>{{ $tCollection->collection_amount }}</td> --}}

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
