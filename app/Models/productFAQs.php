<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productFAQs extends Model
{
    protected $fillable = [
        'product_id',
        'question',
        'answer',
    ];
}
