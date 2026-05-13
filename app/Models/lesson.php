<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    protected $fillable=['title','description','summary','price','duration',
    'discount','course_id','status_id','active','show_in_home','order','chapter_id'];

    public function LessonAttachments(){
          return $this->hasMany(LessonAttachment::class , 'lesson_id');
        }
    public function LessonMedias(){
          return $this->hasMany(LessonMedia::class , 'lesson_id');
        }
    // public function LessonComments(){
    //       return $this->hasMany(LessonComment::class , 'lesson_id');
    //     }
     public function chapter(){
        return $this->belongsTo(chapter::class , 'chapter_id');
    }
}