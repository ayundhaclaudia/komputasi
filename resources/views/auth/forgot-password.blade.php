@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-4">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">

                {{-- TITLE --}}
                <h4 class="text-center fw-bold text-pink mb-2">
                    🔑 Lupa Password
                </h4>

                <p class="text-center text-muted small mb-4">
                    Masukkan email kamu, kami akan kirimkan link untuk reset password.
                </p>

                {{-- STATUS --}}
                <x-auth-session-status
                    class="mb-3 text-center text-pink"
                    :status="session('status')" />

                {{-- FORM --}}
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-pink">
                            Email
                        </label>

                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            class="form-control rounded-pill px-3
                                   border-pink focus-ring-pink"
                            required
                            autofocus
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2 text-danger small"
                        />
                    </div>

                    <button
                        class="btn btn-pink w-100 rounded-pill py-2">
                        Kirim Link Reset Password
                    </button>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}"
                       class="text-pink fw-semibold text-decoration-none">
                        ← Kembali ke Login
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
