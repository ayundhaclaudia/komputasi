@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>ByeBill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    @include('layouts.navbar.nav-guest')

    <main class="container mt-5">
        @yield('content')
    </main>

</body>
</html>

@endsection
