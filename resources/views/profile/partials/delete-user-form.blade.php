<h5 class="fw-bold text-danger mb-2">Hapus Akun</h5>
<p class="text-muted mb-3">
    Tindakan ini tidak dapat dibatalkan.
</p>

<button class="btn btn-danger rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
    🗑️ Hapus Akun
</button>

<div class="modal fade" id="deleteAccountModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <div class="modal-body">
                    <p>Masukkan password untuk konfirmasi.</p>
                    <input type="password" name="password" class="form-control rounded-pill" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button class="btn btn-danger rounded-pill">
                        Hapus Akun
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
