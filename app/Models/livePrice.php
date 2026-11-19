<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class livePrice extends Model
{
    protected $fillable = [
        'price',
        'update_mode',
        'referenceSite_id',
        'difference_type',
        'buy_difference',
        'sell_difference',
    ];
    public function referenceSite()
    {
        return $this->belongsTo(referenceSites::class, 'referenceSite_id');
    }
}
