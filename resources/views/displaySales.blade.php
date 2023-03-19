<!DOCTYPE html>
<html>

<head>
    <title>Sales Report</title>
    <!-- Load Bootstrap CSS -->
</head>

<body>
    <div class="container mt-5">
        <h1>Sales Report</h1>
        <form>
            <div class="row mb-3">
                <div class="col-sm-2">
                    <label for="start-date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start-date">
                </div>
                <div class="col-sm-2">
                    <label for="end-date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end-date">
                </div>
                <div class="col-sm-2">
                    <label for="product-name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product-name" placeholder="Enter product name">
                </div>
                <div class="col-sm-2">
                    <label for="customer-name" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customer-name" placeholder="Enter customer name">
                </div>
                <div class="col-sm-2">
                    <label for="supplier-name" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="supplier-name" placeholder="Enter supplier name">
                </div>
                <div class="col-sm-2">
                    <label for="payment-method" class="form-label">Payment Method</label>
                    <select class="form-select" id="payment-method">
                        <option value="">All</option>
                        <option value="cash">Cash</option>
                        <option value="due">Due</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary">Filter</button>
                    <button type="button" class="btn btn-secondary">Clear</button>
                    <button type="button" class="btn btn-success">Export</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Customer Name</th>
                    <th>Supplier Name</th>
                    <th>Quantity</th>
                    <th>Sale Date</th>
                    <th>Payment Method</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Product 1</td>
                    <td>Customer 1</td>
                    <td>Supplier 1</td>
                    <td>10</td>
                    <td>2022-01-01</td>
                    <td>Cash</td>
                </tr>
                <tr>
                    <td>Product 2</td>
                    <td>Customer 2</td>
                    <td>Supplier 2</td>
                    <td>5</td>
                    <td>2022-02-01</td>
                    <td>Due</td>
                </tr>
                <tr>
                    <td>Product 3</td>
                    <td>Customer 3</td>
                    <td>Supplier 3</td>
                    <td>8</td>
                    <td>2022-03-01</td>
                    <td>Cash</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Load Bootstrap JS and dependencies -->
    
</body>

</html>