<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
    'title',
    'description',
    'progress',
    'summary',
    'price',
    'duration',
    'discount',
    'level_id',
    'status_id',
    'user_id',
    'active',
    'show_in_home',
    'prerequisite'
   ];

   public function medias()
    {
        return $this->hasMany(CourseMedia::class);
    }
}
