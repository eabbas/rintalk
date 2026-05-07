<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
  protected $fillable=
    ["title",
      "description",
      "course_id",
      "price",
      "discount",
     " duration",
       "order"
    ];
  
  public function chapterAtachments(){
    return $this->hasMany(ChapterAtachment::class);
  }


  public function chapterComments(){
    return $this->hasMany(ChapterComment::class);
  }

  public function chapterMedias(){
    return $this->hasMany(ChapterMedia::class);

  }
    
}
