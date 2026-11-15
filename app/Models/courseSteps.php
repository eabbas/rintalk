<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courseSteps extends Model{
    protected $fillable=[
        'title',
        'img',
        'description',
        'step',
        'course_id'
    ];
}
