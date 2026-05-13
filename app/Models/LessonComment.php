<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonComment extends Model
{
     protected $fillable=['user_id','lesson_id','comment','parent_id','active'];

       public function lesson(){
        return $this->belongsTo(lesson::class , 'lesson_id');
    }
    
}
