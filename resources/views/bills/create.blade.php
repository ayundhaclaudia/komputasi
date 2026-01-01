@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm border-0" style="background:#fff0f6">
            <div class="card-body p-4">
                <h4 class="fw-bold text-pink mb-4">➕ Tambah Tagihan</h4>

                <form method="POST" action="{{ route('bills.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Tagihan</label>
                        <input type="text" name="bill_name" class="form-control rounded-pill">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah (Rp)</label>
                        <input type="number" name="amount" class="form-control rounded-pill">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="date" name="due_date" class="form-control rounded-pill">
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('dashboard') }}" class="btn btn-light rounded-pill me-2">
                            Batal
                        </a>
                        <button class="btn btn-pink rounded-pill">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
