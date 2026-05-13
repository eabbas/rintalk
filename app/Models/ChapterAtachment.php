<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterAtachment extends Model
{
    protected $fillable=
    ["title",
      "description",
      "summary",
      "chapter_id",
      "price",
      "discount",
      "file_path",
      "image",
      "type"
    ];

    public function chapter(){
      return $this->belongsTo(chapter::class);
    }
}
