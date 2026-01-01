@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="text-center">Paket ByeBill</h3>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card p-3">
                <h5>FREE</h5>
                <ul>
                    <li>Lihat tagihan</li>
                    <li>Statistik dasar</li>
                </ul>
                <strong>Rp 0</strong>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-3 border-warning">
                <h5>PREMIUM ⭐</h5>
                <ul>
                    <li>Tambah tanpa batas</li>
                    <li>Kelola semua tagihan</li>
                    <li>Pembayaran online</li>
                </ul>
                <strong>Rp 50.000</strong>

                
            </div>
        </div>
    </div>
</div>
@endsection
