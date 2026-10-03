<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class deal extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_id',
        'goldWeight',
        'goldPrice',
        'buyPrice',
        'date',
        'time',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function transaction(){
        return $this->belongsTo(transaction::class);
    }
}
