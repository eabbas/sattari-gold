<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'wallet_id',
        'amount',
        'type',
        'isApproved',
        'receipt'
    ];
    public function deal(){
        return $this->hasOne(deal::class);
    }
    public function wallet(){
        return $this->belongsTo(wallet::class);
    }
}
