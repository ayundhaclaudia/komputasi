<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reminder_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('bill_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('channel', ['email', 'whatsapp']);
            $table->date('reminder_date');

            $table->timestamps();

            $table->unique([
                'user_id',
                'bill_id',
                'channel',
                'reminder_date'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reminder_logs');
    }
};
