<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class level extends Model
{
     protected $fillable=
    ["title",
      "description",
    ];

    public function courses(){
        return $this->hasMany(course::class)->chaperOne();
    }
}
