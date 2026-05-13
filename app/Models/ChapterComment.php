<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    protected $fillable=
    ["comment",
      "active",
      "user_id",
      "chapter_id",
      "parent_id",
    ];

    public function chapter(){
      return $this->belongsTo(chapter::class);
    }
}
