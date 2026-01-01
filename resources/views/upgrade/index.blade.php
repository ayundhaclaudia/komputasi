@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0">
                <div class="card-body p-4 text-center">

                    <h3 class="fw-bold text-pink mb-3">
                        ⭐ Upgrade ke Premium
                    </h3>

                    <p class="text-muted mb-3">
                        Nikmati semua fitur premium ByeBill
                    </p>

                    <ul class="list-group list-group-flush mb-4 text-start">
                        <li class="list-group-item">✅ Unlimited tagihan</li>
                        <li class="list-group-item">✅ Reminder Email & WhatsApp</li>
                        <li class="list-group-item">✅ Export Excel</li>
                    </ul>

                    <button id="pay-button" class="btn btn-pink btn-lg w-100">
                        Bayar
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>

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

                fetch("{{ route('upgrade.success') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(() => {
                    window.location.href = "{{ route('dashboard') }}";
                });

            },
            onPending: function () {
                alert("Menunggu pembayaran...");
            },
            onError: function () {
                alert("Pembayaran gagal");
            }
        });

    });
};
</script>
@endsection
