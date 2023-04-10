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

    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    @include('nav')

    <div class="container">
        <h1 class="my-4">Bank Detail Table</h1>
        <div class="mb-3">
            <input type="text" class="form-control" id="search" placeholder="Search bank">
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Account Title</th>
                    <th scope="col">Bank & Branch</th>
                    <th scope="col">Available Balance</th>
                </tr>
            </thead>
            <tbody id="bankTable">
                <!-- Add your bank data rows here -->
                @forelse($items as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                        <td>{{ $item->account_title }}</td>
                        <td>{{ $item->bank_name }}</td>
                        <td>Rs. {{ $item->balance }}</td>
                    </tr>
                @empty
                    <li class="list-group-item list-group-item-danger">No account found.</li>
                @endforelse
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xM6oOTA2m" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#bankTable tr');
            for (const row of rows) {
                const nameCell = row.querySelector('td:nth-child(2)');
                if (nameCell) {
                    const name = nameCell.textContent.toLowerCase();
                    row.classList.toggle('hidden', name.indexOf(searchTerm) === -1);
                }
            }
        });
    </script>
</body>

</html>
