<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $fillable = [
        'title',
        'link',
        'parent_id',
        'status',
    ];
    public function children()
    {
        return $this->hasMany(menu::class, 'parent_id')->with('children');
    }
    public function parent()
    {
        return $this->belongsTo(menu::class, 'parent_id');
    }
}
