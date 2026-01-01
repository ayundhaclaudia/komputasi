<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Bill;
use App\Mail\BillReminderMail;
use App\Services\WhatsAppService;
use Illuminate\Support\Facades\Mail;

class SendPremiumReminders extends Command
{
    protected $signature = 'reminder:premium';
    protected $description = 'Kirim reminder email & WA untuk user premium';

    public function handle()
    {
        $users = User::where('is_premium', true)->get();

        foreach ($users as $user) {
            $bills = Bill::where('user_id', $user->id)
                ->where('status', '!=', 'Sudah Dibayar')
                ->whereDate('due_date', '<=', now()->addDays(3))
                ->get();

            foreach ($bills as $bill) {

                // EMAIL
                Mail::to($user->email)
                    ->send(new BillReminderMail($bill));

                // WHATSAPP
                if ($user->phone) {
                    WhatsAppService::send(
                        $user->phone,
                        "⏰ Reminder BillRemind\n".
                        "Tagihan: {$bill->bill_name}\n".
                        "Jatuh tempo: {$bill->due_date}\n".
                        "Jumlah: Rp ".number_format($bill->amount)
                    );
                }
            }
        }
    }
}
