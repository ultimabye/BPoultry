<script type="text/javascript" src="{{ asset('js/addFormJs.js') }}"></script>

<body id="addData">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h1 class="h2">Add Data</h1>
                <p>Click on the button to enter the data</p>
                <div class="container mt-4">
                    <button id="addSupplier" type="button" class="btn btn-primary">Add Supplier</button>
                    <button id="addCustomer" type="button" class="btn btn-primary">Add Customer</button>
                    <button id="addExpences" type="button" class="btn btn-primary">Add Expences</button>

                    <div id="selectionAddSupplier">
                        @include('addSupplier')
                    </div>
                    <div id="selectionAddCustomer">
                        @include('addCustomer')
                    </div>
                    <div id="seletionAddExpences">
                        @include('addExpences')
                    </div>
                </div>
            </div>
        </div>
</body>
