<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonMedia extends Model
{
      protected $fillable=['lesson_id','file_path','duration','order','preview'];

        public function lesson(){
        return $this->belongsTo(lesson::class , 'lesson_id');
    }
}
