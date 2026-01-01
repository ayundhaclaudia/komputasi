<h5 class="fw-bold mb-3 text-pink">Informasi Profil</h5>
<p class="text-muted mb-4">Perbarui nama dan email akun Anda.</p>

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text"
               name="name"
               class="form-control rounded-pill"
               value="{{ old('name', auth()->user()->name) }}"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
               name="email"
               class="form-control rounded-pill"
               value="{{ old('email', auth()->user()->email) }}"
               required>
    </div>

    <button class="btn btn-pink rounded-pill px-4">
        💾 Simpan Profil
    </button>
</form>
