<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ad Group</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>

<body>
    @include('nav')
    <div class="container mt-5">
        <h2>Customer Table with Filters</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="filter">Filter by:</label>
                    <select id="filter" class="form-control">
                        <option value="">All</option>
                        <option value="cash">Cash</option>
                        <option value="due">Due</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Phone</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->number }}</td>
                        <td>{{ $customer->address }}</td>
                        <td data-type="cash">RS 0</td>

                        <td><button class="btn btn-primary edit-btn">Edit</button></td>

                    </tr>
                @empty
                    <li class="list-group-item list-group-item-danger">No supplier found.</li>
                @endforelse


            </tbody>
        </table>
    </div>
    </div>
    <script>
        $(document).ready(function() {
            // Add a filter event listener to the select element
            $('#filter').change(function() {
                var selected = $(this).val(); // Get the selected value
                $('tbody tr').hide(); // Hide all rows
                if (selected === '') {
                    $('tbody tr').show(); // If the "All" option is selected, show all rows
                } else {
                    $('tbody td[data-type="' + selected + '"]').parent()
                        .show(); // Otherwise, show rows with data-type matching the selected value
                }
            });
        });
    </script>
</body>

</html>
