<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel CRUD')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="{{ url('/') }}">MyApp</a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-2 bg-light p-3" style="min-height: 100vh;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('produk.index') }}" class="nav-link">Produk</a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="col-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
