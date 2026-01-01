@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-4">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">

                <h4 class="text-center fw-bold text-pink mb-2">
                    ✨ Daftar ByeBill
                </h4>

                <p class="text-center text-muted small mb-4">
                    Buat akun baru dan kelola tagihanmu dengan mudah
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger small">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- NAMA --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-pink">Nama</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control rounded-pill px-3 border-pink focus-ring-pink"
                               required>
                    </div>

                    {{-- NOMOR TELEPON --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-pink">Nomor Telepon</label>
                        <input type="text"
                               name="phone"
                               value="{{ old('phone') }}"
                               placeholder="08xxxxxxxxxx"
                               class="form-control rounded-pill px-3 border-pink focus-ring-pink"
                               required>
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-pink">Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control rounded-pill px-3 border-pink focus-ring-pink"
                               required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-pink">Password</label>
                        <input type="password"
                               name="password"
                               class="form-control rounded-pill px-3 border-pink focus-ring-pink"
                               required>
                    </div>

                    {{-- KONFIRMASI --}}
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-pink">Konfirmasi Password</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control rounded-pill px-3 border-pink focus-ring-pink"
                               required>
                    </div>

                    <button class="btn btn-pink w-100 rounded-pill py-2">
                        Daftar Sekarang
                    </button>
                </form>

                <div class="text-center mt-4">
                    <span class="text-muted small">Sudah punya akun?</span>
                    <a href="{{ route('login') }}"
                       class="text-pink fw-semibold text-decoration-none">
                        Login
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
