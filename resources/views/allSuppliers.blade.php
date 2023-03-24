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
    <div class="row">
        <div class="col-12">
            <h1>Supplier Table</h1>
            <div class="mb-3">
                <label for="search" class="form-label">Search:</label>
                <input type="text" id="search" class="form-control" placeholder="Enter a search term...">
            </div>
            <div class="mb-3">
                <label for="filter" class="form-label">Filter by:</label>
                <select id="filter" class="form-select">
                    <option value="">All</option>
                    <option value="Hardware">Hardware</option>
                    <option value="Office Supplies">Office Supplies</option>
                    <option value="Food and Beverage">Food and Beverage</option>
                </select>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Supplier Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ABC Company</td>
                        <td>555-123-4567</td>
                        <td>123 Main St</td>
                    </tr>
                    <tr>
                        <td>XYZ Corporation</td>
                        <td>555-987-6543</td>
                        <td>456 Park Ave</td>
                    </tr>
                    <tr>
                        <td>123 Industries</td>
                        <td>555-555-5555</td>
                        <td>789 Elm St</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>