<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentenseWords extends Model
{
    protected $fillable=['flag','sentence_id','word','mean'];

    public function Sentense(){

        return $this->belongsTo(Sentense::class , 'sentence_id');
        
    }
    public function leitnary(){

        return $this->belongsTo(leitnary::class , 'word_id');
        
    }
}
