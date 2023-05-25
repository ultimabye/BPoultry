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
                <div class="col-md-12 card pb-2">
                    <h1 class="my-4">Update Contractor</h1>

                    <form method="post" action="{{ url('update-contractor') }}">
                        @csrf
                        <input name="id" type="hidden" value="{{ $item->id }}">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contractor-name" class="form-label">Contractor Name</label>
                                    <input type="text" class="form-control" id="contractor-name" name="name"
                                        placeholder="Enter contractor name" value="{{ $item->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="contractor-phone" class="form-label">Contractor Phone</label>
                                    <input class="form-control" id="phone_number" value="{{ $item->phone_number }}"
                                        name="contractor_phone" placeholder="Enter contractor phone">
                                </div>
                                <div class="mb-3">
                                    <label for="contractor-address" class="form-label">Contractor Address</label>
                                    <textarea class="form-control" id="contractor-address" name="address" placeholder="Enter contractor address">{{ $item->address }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title mt-4">Shops</h3>
                                @forelse($shops as $shop)
                                    @if ($item->isManagingShop($shop->id))
                                        <input class="form-check-input" checked type="checkbox" name="shops[]"
                                            id="{{ $shop->id }}" value="{{ $shop->id }}"> {{ $shop->name }}
                                        <br>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="shops[]"
                                            id="{{ $shop->id }}" value="{{ $shop->id }}"> {{ $shop->name }}
                                        <br>
                                    @endif
                                @empty
                                    <li class="list-group-item list-group-item-danger">No shops found.</li>
                                @endforelse
                            </div>
                        </div>
                    
                        <div class="mt-5"></div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    

                </div>

            </div>

        </div>

    </div>
</body>

</html>
