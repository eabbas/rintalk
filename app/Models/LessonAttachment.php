<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonAttachment extends Model
{
    protected $fillable=['title','description','summary','price',
    'discount','file_path','image','lesson_id','type'];

    public function lesson(){
        return $this->belongsTo(lesson::class , 'lesson_id');
    }
}
