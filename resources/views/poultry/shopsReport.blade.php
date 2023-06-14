<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contracters</title>
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
        <h1 class="my-4">Shops Details</h1>
        <div class="container">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Shop Name</th>
                        <th>Address</th>
                        <th>Driver</th>
                        <th>Due Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr onclick="window.location='shop/{{ $item->id }}/detail'">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>

                            @if (!is_null($item->driver))
                                <td>{{ $item->driver->name }}</td>
                            @else
                                <td>---</td>
                            @endif

                            <td>Rs. {{ $item->getAmountDue() }}</td>
                        </tr>
                    @empty
                        <li class="">No shops found.</li>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    </div>

</body>

</html>
