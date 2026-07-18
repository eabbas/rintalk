<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partnerRequests extends Model
{
      protected $fillable = ["user_id", "applicant", 'status'];

      public function User()
      {

            return $this->belongsTo(User::class, 'user_id');
      }
}
