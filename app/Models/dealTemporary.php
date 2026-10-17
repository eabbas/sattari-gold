<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dealTemporary extends Model{
    protected $fillable = [
        'user_id',
        'deal_id',
        'goldPrice',
        'action',
        'calcBy',
        'userInput',
        'resultOutput',
    ];
}
