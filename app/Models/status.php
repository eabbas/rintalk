<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
  protected $fillable = [
        'title',
    ];

     public function courses(){
        return $this->hasMany(course::class);
    }
}
