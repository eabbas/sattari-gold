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
    public function deals(){
        return $this->hasMany(deal::class);
    }
}
