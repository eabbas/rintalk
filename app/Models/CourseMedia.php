<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseMedia extends Model
{
    protected $fillable = [
        'course_id',
        'file_paht',
        'duration',
        'order',
        'type',
        'preview'
    ];
    
    public function course()
    {
        return $this->belongsTo(course::class);
    }
}
