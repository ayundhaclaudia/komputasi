@extends('layouts.app')

@section('content')
<section class="py-5" style="background-color:#fff1f5;">
    <div class="container">
        <div class="row align-items-center">

            <!-- KIRI -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="badge rounded-pill text-danger border border-danger px-3 py-2 mb-3">
                    Aplikasi Pengelola Tagihan
                </span>

                <h1 class="fw-bold display-5 mt-3">
                    Kelola Tagihan Lebih Rapi,<br>
                    ByeBill Solusinya!
                </h1>

                <p class="text-muted fs-5 mt-3">
                    ByeBill membantu Anda mencatat, memantau, dan mengelola seluruh
                    tagihan pelanggan secara cepat, mudah, dan terorganisir.
                </p>

                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('register') }}" class="btn btn-danger btn-lg rounded-pill px-4">
                        Coba Gratis Sekarang
                    </a>
                </div>

                <div class="mt-4 text-success fw-semibold">
                    ✔ Gratis tanpa kartu kredit
                    <br>
                    ✔ Cocok untuk UMKM & Freelancer
                </div>
            </div>

            <!-- KANAN -->
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/byebill-logo.png') }}" alt="ByeBill">
            </div>

        </div>
    </div>
</section>
@endsection
