<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class defaultComments extends Model
{
    protected $fillable = [
        'userName',
        'comment',
        'img',
        'date',
        'time',
    ];
}
