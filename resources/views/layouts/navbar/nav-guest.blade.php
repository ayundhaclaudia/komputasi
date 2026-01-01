<nav class="navbar navbar-expand-lg navbar-pink shadow-sm py-3">
    <div class="container">

        <a class="navbar-brand fw-bold fs-4" href="{{ route('welcome') }}">
            ByeBill
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="guestNavbar">

            <ul class="navbar-nav mx-auto gap-lg-4">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('fitur') }}">Fitur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('manfaat') }}">Manfaat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('harga') }}">Harga</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('bantuan') }}">Bantuan</a>
                </li>
            </ul>

            <div class="d-flex gap-3">
                <a href="{{ route('login') }}" class="btn btn-pink-outline px-4">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-pink px-4">
                    Coba Gratis
                </a>
            </div>

        </div>
    </div>
</nav>
