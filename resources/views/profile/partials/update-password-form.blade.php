<h5 class="fw-bold mb-3 text-pink">Ubah Kata Sandi</h5>
<p class="text-muted mb-4">Gunakan kata sandi yang aman.</p>

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Password Saat Ini</label>
        <input type="password" name="current_password" class="form-control rounded-pill">
    </div>

    <div class="mb-3">
        <label class="form-label">Password Baru</label>
        <input type="password" name="password" class="form-control rounded-pill">
    </div>

    <div class="mb-3">
        <label class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control rounded-pill">
    </div>

    <button class="btn btn-outline-pink rounded-pill px-4">
        🔐 Perbarui Password
    </button>
</form>
