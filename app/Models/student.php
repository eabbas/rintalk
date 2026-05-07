<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable=
    ["name",
      "family",
      "gender",
      "age",
      "parent_id"
    ];
}
