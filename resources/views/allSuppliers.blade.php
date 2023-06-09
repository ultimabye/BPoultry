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
                    <form>
                        <input type="text" id="search" class="form-control" name="search"
                            placeholder="Enter a search term..."
                            value="{{ request('search') }}">
                    </form>
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
                        @forelse($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->number }}</td>
                                <td>{{ $supplier->address }}</td>
                            </tr>
                        @empty
                            <li class="list-group-item list-group-item-danger">No supplier found.</li>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
