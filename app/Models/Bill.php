<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'user_id',
        'bill_name',
        'amount',
        'due_date',
        'status'
    ];
}
