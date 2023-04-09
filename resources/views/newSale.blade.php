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
    <script type="text/javascript" src="{{ asset('js/newSale.js') }}"></script>


</head>

<body style="margin-bottom: 50px;">
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
        <form method="post" action="{{ url('save-new-sale') }}">
            @csrf
            <div class="row">
                <div class="col">
                    <label for="date"><b>Date:</b></label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="col">
                </div>
            </div>
            <div class="row">

                <div class="col">

                    <h3>Supplier</h3>
                    <div class="mb-3">
                        <label for="selectSupplier" class="form-label">Select Supplier</label>
                        <select name="supplier_id" id="select-suppliers" class=" form-select purchase">
                            <option disable selected>--select supplier--</option>
                            @foreach ($suppliers as $item)
                                <option value="{{ $item->id }}" data-price="{{ $item->unit_price }}"
                                    data-supplier="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a supplier.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="selectProduct" class="form-label">Select Product</label>
                        <select name="product" id="purchase" class=" form-select purchase">
                            <option disable selected>--select product--</option>
                            @foreach ($products as $item)
                                <option value="{{ $item->id }}" data-price="{{ $item->unit_price }}"
                                    data-supplier="{{ $item->supplier->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            Please select a product.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="productAmount" class="form-label">Product Amount per unit</label>
                        <input type="number" class="form-control" name="price_per_unit" id="productAmount" required>
                        <div class="invalid-feedback">
                            Please enter product amount per unit.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="productQuantity" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="productQuantity" required>
                        <div class="invalid-feedback">
                            Please enter product quantity.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="commissionAmount" class="form-label">Commission Amount (%)</label>
                        <input type="number" class="form-control" name="purchase_discount" id="commissionAmount"
                            required>
                        <div class="invalid-feedback">
                            Please enter commission amount in percentage.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subtotalLabel" class="form-label">Sub Total</label>
                        <input type="text" class="form-control" id="subtotalLabel">
                    </div>
                    <div class="mb-3">
                        <label for="shippingCharges" class="form-label">Shipping Charges</label>
                        <input type="number" class="form-control" id="shippingCharges" name="purchase_freight_charges"
                            required>
                        <div class="invalid-feedback">
                            Please enter shipping charges.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="DiscountAmout" class="form-label">Discount Amount</label>
                        <input type="text" class="form-control" id="discountAmount">
                    </div>
                    <div class="mb-3">
                        <label for="totalLabel" class="form-label">Total </label>
                        <input type="text" class="form-control" id="totalAmount">
                    </div>
                </div>

                <div class="col border-left h-200">
                    <h3>Customer</h3>
                    <div class="mb-3">
                        <label for="selectCustomer" class="form-label">Select Customer</label>
                        <select name="customer" id="customer" class="form-select customer">
                            <option disable selected>--select customer--</option>
                            @foreach ($customers as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cProductName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="cProductName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="cProductSaleAmount" class="form-label">Product Sale Amount per unit</label>
                        <input type="number" class="form-control" id="cProductSaleAmount"
                            name="sale_price_per_unit" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="cProductQuantity" class="form-label">Product Quantity</label>
                        <input type="number" class="form-control" id="cProductQuantity" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="discountPercentage" class="form-label">Discount Percentage</label>
                        <input type="number" class="form-control" name="sale_discount" id="discountPercentage"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label for="customerSubtotalLabel" class="form-label">Sub Total</label>
                        <input type="number" class="form-control" id="customerSubtotal" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="customerShippingCharges" class="form-label">Shipping Charges</label>
                        <input type="number" class="form-control" name="sale_freight_charges"
                            id="customerShippingCharges" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="discountAmount" class="form-label">Discount</label>
                        <input type="number" class="form-control" id="cDiscountAmount" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="customerTotal" class="form-label">Total </label>
                        <input type="number" class="form-control" id="customerTotal" disabled>
                    </div>
                </div>
            </div>
            <hr class="mb-4">
            <div class="row">

                <div class="col">
                    <button class="btn btn-primary w-100">Save</button>
                </div>
            </div>


        </form>
    </div>
</body>

</html>
