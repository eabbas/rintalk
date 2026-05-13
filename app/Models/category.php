<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable=['title','description','image','parent_id'];

     public function parent()
    {
        return $this->belongsTo(category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(category::class, 'parent_id');
    }
   public function courses(){
      return $this->belongsToMany(course::class ,'course_categories' ,'category_id', 'course_id');
   }
}
