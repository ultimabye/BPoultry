<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap 5 Responsive Layout with Sidebar</title>
    <!-- Bootstrap CSS -->
    @include('cdn')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/customJavaScript.js') }}"></script>

</head>

<body onload="onLoad()">


    <header>
        @if (session('status'))
            <div class="alert alert-success col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                {{ session('status') }}
            </div>
        @endif
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid">

        <div class="row">

            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="selectSales">Sale</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="selectAddData">Add Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="selectReports">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="selectLogout">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>


            @include('header')
            <div id="section-sales" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                @include('addSale')

            </div>
            <div id="sectionLogout" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <h1 class="h2">Ad Group</h1>
                <p>Logout</p>
            </div>
            <div id="section-show" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <!-- @include('addSale') -->
                @include('displaySales')
            </div>

            <div id="section-addData" class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                @include('addData')
            </div>



        </div>
    </div>
