<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseAttachment extends Model
{
     protected $fillable = [
        'title',
        'description',
        'summray',
        'course_id',
        'price',
        'discount',
        'file_path',
        'image',
        'type'
    ];
}
