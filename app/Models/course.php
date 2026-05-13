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

     public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function status()
    {
        return $this->belongsTo(status::class);
    }
     public function level()
    {
        return $this->belongsTo(level::class);
    }
    public function categories(){
        return $this->belongsToMany(category::class , 'course_categories' , 'course_id','category_id');
    }
    public function scores(){
        return $this->hasMany(score::class)->chaperOne();
    }
    public function courseAttachments(){
        return $this->hasMany(courseAttachment::class)->chaperOne();
    }
      public function chapters()
    {
    return $this->hasMany(chapter::class , 'course_id');
    }

}
