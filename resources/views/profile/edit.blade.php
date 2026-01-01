@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="text-center mb-4">
                <h3 class="fw-bold text-pink">👤 Profil Akun</h3>
                <p class="text-muted">Kelola informasi akun ByeBill Anda</p>
            </div>

            {{-- PROFILE --}}
            <div class="card mb-4 shadow-sm border-0" style="background:#fff0f6">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- PASSWORD --}}
            <div class="card mb-4 shadow-sm border-0" style="background:#fff0f6">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- DELETE --}}
            <div class="card shadow-sm border-danger">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
    