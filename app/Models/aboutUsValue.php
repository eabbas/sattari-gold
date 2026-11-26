<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aboutUsValue extends Model{
    protected $fillable=[
        'title',
        'description',
        'image',
        'aboutUs_id'
    ];
}
