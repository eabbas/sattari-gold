<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class header extends Model
{
    protected $fillable = [
        'header_bg',
        'header_img',
        'title',
        'subTitle',
        'btnText',
        'btnLink',
        'btnIcon',
    ];
}
