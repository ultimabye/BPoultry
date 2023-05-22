<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Update Contractor</title>
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
        <div class="container">
            <div class="row">
            <div class="col-md-6 card pb-2">
                <h1 class="my-4">Contractor Details</h1>

                <form method="post" action="{{ url('save-shop') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="contractor-name" class="form-label">Contractor Name</label>
                        <input type="text" class="form-control" id="contractor-name" name="contractor_name"
                            placeholder="Enter contractor name">
                    </div>
                    <div class="mb-3">
                        <label for="contractor-phone" class="form-label">Contractor Phone</label>
                        <input class="form-control" id="contractor-phone" name="contractor_phone" placeholder="Enter contractor phone">
                    </div>
                    <div class="mb-3">
                        <label for="contractor-address" class="form-label">Contractor Address</label>
                        <textarea class="form-control" id="contractor-address" name="contractor_address" placeholder="Enter contractor address"></textarea>
                    </div>
    
                    
                    <div class="mt-5"></div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
    
            </div>
            <div class="col-md-6 card">
                <div class="card-body">
                    <h3 class="card-title mt-5">Shops</h3>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="option1">
                      <label class="form-check-label" for="option1">
                        Option 1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="option2">
                      <label class="form-check-label" for="option2">
                        Option 2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="option3">
                      <label class="form-check-label" for="option3">
                        Option 3
                      </label>
                    </div>
              
                </div>

            </div>
            </div>
            
    </div>

</div>
</body>

</html>
