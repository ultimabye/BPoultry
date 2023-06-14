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
                            <h4 id="contractorName">{{ $item->name }}</h4>
                        </div>

                        @if (!is_null($item->driver))
                            <div class="mb-3">
                                <label for="contractorPhone" class="form-label">Phone:</label>
                                <h4 id="contractorPhone">{{ $item->driver->name }}</h4>
                            </div>
                        @else
                            <div class="mb-3">
                                <label for="contractorPhone" class="form-label">Phone:</label>
                                <h4 id="contractorPhone">---</h4>
                            </div>
                        @endif



                        <div class="mb-3">
                            <label for="contractorAddress" class="form-label">Address:</label>
                            <h4 id="contractorAddress">{{ $item->address }}</h4>
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
                                <th>Rate</th>
                                <th>Weight</th>
                                <th>Amount</th>
                                <th>Credit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12-2-21</td>
                                <td>abc</td>
                                <td>10</td>
                                <td>5</td>
                                <td>50</td>
                                <td>0</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>abc</td>
                                <td>15</td>
                                <td>3</td>
                                <td>45</td>
                                <td>10</td>
                                <td>85</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
