<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class segment extends Model{
    protected $fillable=[
        'id',
        'en_name',
        'fa_name'
    ];
}
