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
        <h2>Expenses Table with Filters and Edit Button</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="filter">Filter by:</label>
					<select id="filter" class="form-select">
						<option value="">All</option>
						<option value="food">Food</option>
						<option value="transportation">Transportation</option>
						<option value="entertainment">Entertainment</option>
						<option value="other">Other</option>
					</select>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Expenses Name</th>
						<th>Date</th>
						<th>Amount</th>
						<th>Details</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Food</td>
						<td>2023-03-22</td>
						<td>$20.00</td>
						<td>Lunch with friends</td>
						<td><a href="#" class="edit" title="Edit"><i class="fas fa-edit"></i></a></td>
					</tr>
					<tr>
						<td>Transportation</td>
						<td>2023-03-20</td>
						<td>$15.00</td>
						<td>Uber ride</td>
						<td><a href="#" class="edit" title="Edit"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    <tr>
                    <td>Entertainment</td>
                    <td>2023-03-18</td>
                    <td>$50.00</td>
                    <td>Movie ticket</td>
                    <td><a href="#" class="edit" title="Edit"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    <tr>
                    <td>Other</td>
                    <td>2023-03-15</td>
                    <td>$10.00</td>
                    <td>Office supplies</td>
                    <td><a href="#" class="edit" title="Edit"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
    </div>
    <script>
        $(document).ready(function() {
            // Initialize DataTables
            var table = $('table').DataTable();
    
            // Filter by category
            $('#filter').on('change', function() {
                var category = $(this).val();
                table.columns(0).search(category).draw();
            });
        });
    </script>
    
</body>
</body>
</html>
                