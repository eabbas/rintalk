<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class generalcourse extends Model{
    protected $fillable=[
        'title',
        'description',
        'price',
        'discount',
        'status',
        'img'
    ] ;
}
