<h2>⏰ Reminder Tagihan</h2>

<p>Tagihan <strong>{{ $bill->bill_name }}</strong> akan jatuh tempo.</p>

<ul>
    <li>Jumlah: Rp {{ number_format($bill->amount) }}</li>
    <li>Tanggal: {{ \Carbon\Carbon::parse($bill->due_date)->format('d M Y') }}</li>
</ul>

<p>— BillRemind</p>
