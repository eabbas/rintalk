<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class leitnary extends Model
{
    protected $fillable=['user_id','word_id','answer','step','text_id','is_read','dataTime'];

    public function words(){

    return $this->hasMany(SentenseWords::class , 'word_id');
    
    }
     public function user(){

        return $this->belongsTo(User::class , 'user_id');
        
    }
}
