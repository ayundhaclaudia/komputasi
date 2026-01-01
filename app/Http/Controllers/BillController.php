<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenSpout\Writer\XLSX\Writer;
use OpenSpout\Common\Entity\Row;
use Symfony\Component\HttpFoundation\StreamedResponse;



class BillController extends Controller
{
    /**
     * Tampilkan daftar tagihan
     */

    public function index(Request $request)
    {
        $user = auth()->user();

        $bills = Bill::where('user_id', $user->id)
            ->latest()
            ->get();

        // Reminder FREE: due ≤ 3 hari & belum dibayar
        $dueSoonBills = Bill::where('user_id', $user->id)
            ->where('status', '!=', 'Sudah Dibayar')
            ->whereDate('due_date', '<=', now()->addDays(3))
            ->get();

        return view('bills.index', compact('bills', 'dueSoonBills'));
    }


    /**
     * Form tambah tagihan (dengan limit Free)
     */
    public function create()
{
    $user = Auth::user();

    // Proteksi Free User
    if (!$user->isPremium() && $user->bills()->count() >= 3) {
        return redirect()
            ->route('bills.index')
            ->with('error', 'Limit tagihan Free tercapai. Upgrade ke Premium ⭐');
    }

    return view('bills.create');
}
    /**
     * Simpan tagihan baru
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Proteksi backend (anti bypass URL)
        if (!$user->isPremium() && $user->bills()->count() >= 3) {
            return redirect()
                ->route('bills.index')
                ->with('error', 'Upgrade ke Premium untuk menambah tagihan ⭐');
        }

        $request->validate([
            'bill_name' => 'required|string|max:255',
            'amount'    => 'required|numeric',
            'due_date'  => 'required|date',
        ]);

        $user->bills()->create([
            'bill_name' => $request->bill_name,
            'amount'    => $request->amount,
            'due_date'  => $request->due_date,
            'status'    => 'Belum Dibayar',
        ]);

        return redirect()
            ->route('bills.index')
            ->with('success', 'Tagihan berhasil ditambahkan');
    }

    /**
     * Form edit tagihan
     */
    public function edit(Bill $bill)
    {
        // Optional: proteksi kepemilikan data
        $this->authorizeBill($bill);

        return view('bills.edit', compact('bill'));
    }

    /**
     * Update tagihan
     */
    public function update(Request $request, Bill $bill)
    {
        $this->authorizeBill($bill);

        $request->validate([
            'bill_name' => 'required|string|max:255',
            'amount'    => 'required|numeric',
            'due_date'  => 'required|date',
            'status'    => 'required',
        ]);

        $bill->update($request->all());

        return redirect()
            ->route('bills.index')
            ->with('success', 'Tagihan diperbarui');
    }

    /**
     * Hapus tagihan
     */
    public function destroy(Bill $bill)
    {
        $this->authorizeBill($bill);

        $bill->delete();

        return back()->with('success', 'Tagihan berhasil dihapus');
    }

    /**
     * Export data (Premium Only)
     */

    public function export(): StreamedResponse
    {
        $user = auth()->user();

        if (!$user->isPremium()) {
            abort(403);
        }

        $bills = $user->bills()->latest()->get();

        $response = new StreamedResponse(function () use ($bills) {

            $writer = new Writer();
            $writer->openToBrowser('tagihan-billremind.xlsx');

            // HEADER
            $headerRow = Row::fromValues([
                'Nama Tagihan',
                'Jumlah',
                'Jatuh Tempo',
                'Status',
                'Dibuat'
            ]);
            $writer->addRow($headerRow);

            // DATA
            foreach ($bills as $bill) {
                $writer->addRow(Row::fromValues([
                    $bill->bill_name,
                    $bill->amount,
                    $bill->due_date,
                    $bill->status,
                    $bill->created_at->format('d-m-Y'),
                ]));
            }

            $writer->close();
        });

        return $response;
    }

    public function fitur()
    {
        return view('pages.fitur');
    }

    public function manfaat()
    {
        return view('pages.manfaat');
    }

    public function harga()
    {
        return view('pages.harga');
    }

    public function bantuan()
    {
        return view('pages.bantuan');
    }

    /**
     * Proteksi data milik user sendiri
     */
    private function authorizeBill(Bill $bill)
    {
        if ($bill->user_id !== auth()->id()) {
            abort(403);
        }
    }
}

