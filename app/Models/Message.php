<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\segment;

class Message extends Model
{
    protected $fillable = ['message', 'status' , 'segment_id'];

    public function segment(){
        return $this->belongsTo(segment::class , 'segment_id');
    }
}
