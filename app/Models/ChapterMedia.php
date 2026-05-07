<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterMedia extends Model
{
protected $fillable=
    ["chapter_id",
      "file_path",
      "duration",
      "order",
      "preview"
    ];

 public function chapter(){
      return $this->belongsTo(chapter::class);
    }
}

