<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
    'title',
    'description',
    'summary',
    'price',
    'discount',
    'level_id',
    'status_id',
    'active',
    'show_in_home',
    'file_path',
    'image'
   ];
   
}
