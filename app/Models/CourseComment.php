<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
     protected $fillable=[
        'comment' , 
        'course_id' , 
        'user_id',
        'parent_id',
        'active'
    ];
}
