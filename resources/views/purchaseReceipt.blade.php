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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>AD Group</h2>
                                <p>Sargodha</p>

                            </div>
                            <div class="col-md-6 text-end">
                                <h3>Purchase Receipt</h3>
                                <p>Date: {{ date('m/d/Y', Session::get('product_data')->date) }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Product Details</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Session::get('product_data')->name }}</td>
                                            <td>{{ Session::get('purchase_data')->quantity }}</td>
                                        </tr>
                                        <tr>
                                            <td>Product B</td>
                                            <td>1</td>
                                        </tr>
                                        <tr>
                                            <td>Product C</td>
                                            <td>4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Supplier Information</h4>
                                <p>Supplier Name: {{ Session::get('supplier')->name }}</p>
                                <p>Address: {{ Session::get('supplier')->address }}</p>
                                <p>{{ Session::get('supplier')->number }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Freight Charges</h4>
                                <p>Rs. {{ Session::get('purchase_data')->freight_charges }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Summary</h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>Rs. {{ Session::get('sub_total') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Due Amount</td>
                                            <td>Rs. {{ Session::get('purchase_data')->amount_due }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Amount</td>
                                            <td>Rs. {{ Session::get('total') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
