<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leitnary;
use App\Models\SentenseWords;
use App\Models\User;
use App\Models\Sentence;
use Illuminate\Support\Facades\Auth;
use Hekmatinasser\Verta\Verta;
use Log;

class LeitnaryController extends Controller
{
    public function store(Request $request){
    $verta=Verta('+1 day')->format('Y.m.d');
    $data=leitnary::create(['user_id'=>Auth::id() , 'word_id'=>$request->word_id , 'dataTime'=>$verta]);
    return response()->json($data);
    }
    public function delete(Request $request){
    $word=leitnary::where('word_id',$request->word_id)->first();
    $word->delete();
    return response()->json();
    }
    public function userLeitnary(){
        $varta=Verta()->format('Y.m.d');
        $isRead=leitnary::where('is_read',1)->get();
        $words=leitnary::where('user_id',Auth::id())->get();
        if(count($isRead)===count($words)){
        foreach($words as $word){
        $word->is_read=0;
        $word->save();
        }
        }
        $user=Auth::user();
        $userLeitnary=$user->leitnaries;
        $words = [];
    foreach($userLeitnary as $item){
        $word = SentenseWords::find($item->word_id);
        if($word){
            $words[] = [
                'step'=>$item->step,
                'dataTime'=> $item->dataTime,
            ];
        }
    }
    return view("admin.leitnary.userLeitnar" , ['words'=>$words , 'today'=>$varta]);
    }
    public function getWords(Request $request){
        // return response()->json($request->all());
        $verta=Verta()->format('Y.m.d');
        $isRead=leitnary::where('is_read',1)->get();
        $words=leitnary::where('user_id',Auth::id())->get();
        if(count($isRead)===count($words)){
        foreach($words as $word){
        $word->is_read=0;
        $word->save();
        }
        }
        $user=Auth::user();
        $userLeitnary=$user->leitnaries;
        $words = [];
    foreach($userLeitnary as $item){
        if($item->step==$request->step && $item->dataTime<=$verta){
            $word = SentenseWords::find($item->word_id);
            $sentence = Sentence::where('id',$word->sentence_id)->first();
            if($word){
                $words[] = [
                    'leitnary_id' => $item->id,
                    'id' => $word->id, 
                    'word' => $word->word, 
                    'wordMeaning' => $word->mean,
                    'dataTime'=> $item->dataTime,
                    'sentence' =>$sentence->sentence,
                    'sentenceMeaning' =>$sentence->mean,
                ];
            }
        }
    }
    if(empty($words)){
        return response()->json($request->step+1);

    }
        return response()->json(['words'=>$words , 'today'=>$verta]);
    }
   public function review(Request $request){
    if($request->flag == "1"){
        $item = leitnary::where('word_id', $request->word_id)->first();
        if($item) {
            $item->answer = 1;
            $item->step++;
            if($item->step==2){
                $item->dataTime=Verta('+2 day')->format('Y.m.d');
            }
            if($item->step==3){
                $item->dataTime=Verta('+4 day')->format('Y.m.d');
            }
            if($item->step==4){
                $item->dataTime=Verta('+8 day')->format('Y.m.d');
            }
            if($item->step==5){
                $item->dataTime=Verta('+16 day')->format('Y.m.d');
            }
            if($item->step==6){
                $item->dataTime=Verta('+32 day')->format('Y.m.d');
            }
            if($item->step==7){
                $item->dataTime=Verta('+64 day')->format('Y.m.d');
            }
            $item->is_read= 1;
            $item->save();
            }
        }else{
            $item = leitnary::where('word_id', $request->word_id)->first();
            if($item) {
            $item->dataTime=Verta('+1 day')->format('Y.m.d');
            $item->answer = 0;
            $item->step =1;
            $item->is_read= 1;
            $item->save();
            }
        }
         return response()->json('ok');
    }
}
