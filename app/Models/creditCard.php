<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class creditCard extends Model
{
    protected $fillable = [
        'user_id',
        'card_number',
        'account_number',
        'shaba_number',
        'default',
    ];
}
