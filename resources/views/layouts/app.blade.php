<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ByeBill</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Pink Theme -->
    <style>
        .text-pink {
            color: #e83e8c;
        }
        .btn-pink {
            background-color: #e83e8c;
            color: #fff;
        }
        .btn-pink:hover {
            background-color: #d63384;
            color: #fff;
        }
        .btn-outline-pink {
            border: 2px solid #e83e8c;
            color: #e83e8c;
        }
        .btn-outline-pink:hover {
            background-color: #e83e8c;
            color: #fff;
        }
    </style>
</head>

<body class="bg-light">

    {{-- NAVBAR (AUTO SWITCH) --}}
    @auth
        @include('layouts.navbar.nav-auth')
    @else
        @include('layouts.navbar.nav-guest')
    @endauth

    {{-- CONTENT --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
