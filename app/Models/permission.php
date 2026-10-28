<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $fillable = [
        'en_title',
        'fa_title'
    ];
}
