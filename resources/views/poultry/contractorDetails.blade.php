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
                    <h4>Contractor Information</h4>
                    <form>
                        <div class="mb-3">
                            <label for="contractorName" class="form-label">Name:</label>
                            <h4 id="contractorName">{{ $contractor->name }}</h4>
                        </div>
                        <div class="mb-3">
                            <label for="contractorPhone" class="form-label">Phone:</label>
                            <h4 id="contractorPhone">{{ $contractor->phone_number }}</h4>
                        </div>
                        <div class="mb-3">
                            <label for="contractorAddress" class="form-label">Address:</label>
                            <h4 id="contractorAddress">{{ $contractor->address }}</h4>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-end"> <button type="button" id="printBtn" onclick="printPage()"
                        class="btn btn-primary">Print</button></div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Contractor Ledger</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Shop/Particulars</th>
                                <th>Rate</th>
                                <th>Weight</th>
                                <th>Amount</th>
                                <th>Credit</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ date('d/m/y', strtotime($item->entry_date)) }}</td>

                                    @if ($item->isCollection())
                                        <td>{{ $item->shop->name }}</td>
                                        <td>{{ number_format($item->rate->amount, 2) }}</td>
                                        <td>{{ number_format($item->collection_amount, 2) }}</td>
                                        <td>{{ number_format($item->rate->amount * $item->collection_amount, 2) }}</td>
                                        <td></td>
                                        <td>{{ number_format($contractor->getAmountDueTill($item->entry_date), 2) }}
                                        </td>
                                    @else
                                        <td>{{ $item->description }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ number_format($item->amount, 2) }}</td>
                                        <td>{{ number_format($contractor->getAmountDueTill($item->entry_date), 2) }}
                                        </td>
                                    @endif


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
<script>
    function printPage() {
        window.print();
    }
</script>

</html>
