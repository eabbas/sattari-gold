<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    protected $table = 'contact_us';
    protected $fillable = [
        'fullName',
        'email',
        'phone',
        'subject',
        'message',
    ];
}
