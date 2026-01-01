@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0">
                <div class="card-body p-4 text-center">

                    <h4 class="fw-bold text-pink mb-3">
                        💎 Pembayaran Premium
                    </h4>

                    <p class="text-muted">
                        Upgrade ke <strong class="text-pink">Premium</strong> untuk membuka semua fitur:
                    </p>

                    <ul class="list-group list-group-flush mb-3 text-start">
                        <li class="list-group-item">✅ Unlimited Tagihan</li>
                        <li class="list-group-item">✅ Reminder Email & WhatsApp</li>
                        <li class="list-group-item">✅ Export Excel</li>
                    </ul>

                    <h5 class="fw-bold text-pink mb-4">
                        Rp 50.000
                    </h5>

                    <button id="pay-button" class="btn btn-pink btn-lg w-100">
                        💳 Bayar Sekarang
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- Midtrans Snap (Sandbox) --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

<script>
document.getElementById('pay-button').onclick = function () {

    fetch("{{ route('upgrade.pay') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    })
    .then(res => res.json())
    .then(data => {

        snap.pay(data.token, {
            onSuccess: function () {
                upgradeSuccess();
            },
            onPending: function () {
                upgradeSuccess();
            },
            onError: function () {
                alert("Pembayaran gagal");
            }
        });

    });
};

function upgradeSuccess() {
    fetch("{{ route('upgrade.success') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
    }).then(() => {
        window.location.href = "{{ route('dashboard') }}";
    });
}
</script>
@endsection
