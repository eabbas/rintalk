<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    protected $fillable=['text_id','sentence','mean'];

     public function words(){

    return $this->hasMany(SentenseWords::class , 'sentence_id');
    
    }
    public function Text(){

        return $this->belongsTo(Text::class , 'text_id');
        
    }
}
