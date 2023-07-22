<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add Driver</title>
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
        <div class="container card pb-2">
            <h1 class="my-4 ">Update Driver</h1>
            <form method="post" action="{{ url('update-driver') }}">
                @csrf
                <input name="id" type="hidden" value="{{ $item->id }}">
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ $item->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact No</label>
                            <input type="tel" class="form-control" value="{{ $item->contact_no }}" id="contact"
                                name="contact_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="cnic" class="form-label">CNIC</label>
                            <input type="text" class="form-control" id="cnic" value="{{ $item->cnic }}" name="cnic" required>
                        </div>
                        <div class="mb-3">
                            <label for="license" class="form-label">Driver License Number</label>
                            <input type="text" class="form-control" value="{{ $item->license_no }}" id="license"
                                name="license_number">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{$item->password}}" required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="route-number" class="form-label">Vehicle Number</label>
                            <input type="text" class="form-control" id="route-number" value="{{ $item->vehicle_no }}"
                                name="vehicle_no" required>
                        </div>
                        <div class="mb-3">
                            <label for="route-name" class="form-label">Route Name</label>
                            <input type="text" class="form-control" id="route-name" value="{{ $item->route_name }}"
                                name="route_name" required>
                        </div>
                        <h3 class="card-title mt-5">Shops</h3>
                @forelse($shops as $shop)
                    @if ($item->isHandlingShop($shop->id))
                        <input class="form-check-input" checked type="checkbox" name="shops[]" id="{{ $shop->id }}"
                            value="{{ $shop->id }}"> {{ $shop->name }}
                        <br>
                    @else
                        <input class="form-check-input" type="checkbox" name="shops[]" id="{{ $shop->id }}"
                            value="{{ $shop->id }}"> {{ $shop->name }}
                        <br>
                    @endif
                @empty
                    <li class="list-group-item list-group-item-danger">No shops found.</li>
                @endforelse
                    </div>
                </div>
            
                
            
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            

        </div>
    </div>
</body>

</html>
