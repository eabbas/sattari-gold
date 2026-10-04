<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    protected $fillable = [
        'user_id',
        'asset',
        'goldWeight',
    ];
    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }
}
