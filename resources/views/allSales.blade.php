<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ad Group</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <script type="text/javascript" src="{{ asset('js/tableJavaScript.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>


</head>

<body>
    @include('nav')

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">

            <div class=" mt-3">
                <h1>All Sales</h1>
                <div class="">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control"
                                placeholder="Search by Product Name or Customer Name">
                        </div>
                        <div class="col-md-6 text-end">
                            <a class="btn btn-primary" href="{{ url('/newSale') }}" type="button">New</a>
                            <button type="button" class="btn btn-success"onclick="printSaleReport()">Print Sales
                                Report</button>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th style="border-right: 1px solid">Quantity</th>
                                    <th>Supplier</th>
                                    <th>Discount</th>
                                    <th>Freight</th>
                                    <th style="border-right: 1px solid">Amount Due</th>
                                    <th>Customer</th>
                                    <th>Discount (%)</th>
                                    {{-- <th>Sub Total</th> --}}
                                    <th>Freight</th>
                                    {{-- <th>Total</th> --}}
                                    <th>Amount Due</th>


                                </tr>
                            </thead>
                            <tbody>

                                @forelse($purchases as $purchase)
                                    <tr>
                                        <td>{{ date('m/d/Y', $purchase->sale->date) }}</td>
                                        <td>{{ $purchase->product->name }}</td>
                                        <td style="border-right: 1px solid">{{ $purchase->quantity }} x
                                            Rs.{{ $purchase->sale->price_per_unit }}</td>
                                        <td>{{ $purchase->product->supplier->name }}</td>
                                        <td>{{ $purchase->discount }}%</td>
                                        <td>Rs.{{ $purchase->freight_charges }}</td>
                                        <td style="border-right: 1px solid">Rs. {{ $purchase->amount_due }}</td>
                                        <td>{{ $purchase->sale->customer->name }}</td>
                                        <td>{{ $purchase->sale->discount }}%</td>
                                        {{-- <td>Rs.{{ $sale->price_per_unit * $sale->quantity - (($sale->price_per_unit * $sale->quantity) / 100) * $sale->discount }} --}}
                                        </td>
                                        <td>Rs.{{ $purchase->sale->freight_charges }}</td>
                                        {{-- <td>Rs.
                                            {{ $sale->price_per_unit * $sale->quantity - (($sale->price_per_unit * $sale->quantity) / 100) * $sale->discount + $sale->freight_charges }}
                                        </td> --}}
                                        <td>Rs. {{ $purchase->sale->amount_due }}</td>
                                        <td><a href="{{ url('/invoice/view/' . $purchase->id) }}"
                                                class="btn btn-primary"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>





                                @empty
                                    <li class="list-group-item list-group-item-danger">No Sales Found.</li>
                                @endforelse

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="border: none"></th>
                                    <th style="border: none"></th>
                                    <th style="border: none"></th>
                                    <th style="border: none"></th>
                                    <th style="border: none"></th>
                                    <th>Total Due</th>
                                    <th>Rs: {{ $totalPayable }}</th>
                                    <th style="border: none"></th>
                                    <th style="border: none"></th>
                                    {{-- <th>Grand Total</th> --}}
                                    <th>Total Due</th>
                                    <th>Rs: {{ $totalReceivable }}</th>
                                </tr>
                                {{-- <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                     <th>Rs: {{ $totalAmount }}</th>
                                    <th>Rs: {{ $amountDue }}</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                   <th>Amount Received</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                   <th>Rs: {{ $amountReceived }}</th>
                                    <th></th>
                                </tr> --}}


                            </tfoot>
                        </table>


                    </div>
                </div>

            </div>

        </div>
        <div class="col-1"></div>
    </div>



    <script>
        $('#print-invoice').click(function() {
            var itemId = $(this).data('item-id');
            alert("Button Clicked" + itemId);
            window.open("/invoiceDetails");

        });
    </script>
    <script>
        function printSaleReport() {
            window.print();

        }
    </script>


</body>

</html>
