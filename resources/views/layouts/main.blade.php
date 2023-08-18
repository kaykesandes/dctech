<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="/" class="navbar-brand">
                    <img src="/img/icon.png" alt="icon">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Registrar venda</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link">Gerar PDF</a>
                    </li>
                </ul>
            </nav>
        </header>      
    
        @yield('main')
        <footer>
            <p>Kayke &copy; 2023</p>
        </footer>
    </body>
</html>