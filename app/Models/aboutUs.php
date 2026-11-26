<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aboutUs extends Model{
    protected $fillable=[
        'title',
        'description',
        'ourStory',
        'video'
    ];
    public function value(){
        return $this->hasMany(aboutUsValue::class , 'aboutUs_id');
    }
    public function gallery(){
        return $this->hasMany(aboutUsGallery::class , 'aboutUs_id');
    }
}
