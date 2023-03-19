
        

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Basic Layout</title>
    <!-- Bootstrap CSS -->
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Bootstrap 5</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <main>
            <h1>Hello, Bootstrap 5!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod magna vel justo eleifend, non auctor metus ultricies. Morbi vestibulum, velit eget venenatis sodales, nibh quam bibendum arcu, vel rutrum lorem augue et odio. Nunc congue massa id tincidunt blandit. Cras in ex vel sapien dignissim consequat.</p>
        </main>
        <footer>
            <hr>
            <p>&copy; 2023 Bootstrap 5</p>
        </footer>
    </div>
    <!-- Bootstrap JS -->
 
</body>
</html>

   



