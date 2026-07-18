<?php

namespace App\Http\Controllers;
use App\Models\Text;
use App\Models\Sentence;
use App\Models\SentenseWords;
use App\Models\leitnary;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function create(){
        return view("admin.Text.create");
    }

    public function store(Request $request){
    $textId = Text::insertGetId(['text' => $request->text]);

    $text = str_replace( ["\n" , "\t" , "\r"] , " " ,$request->text);

    // dd($text);

    $sentences = explode('.', trim($text));
    if(strlen($sentences[count($sentences) - 1]) < 1 ){
        unset($sentences[count($sentences) - 1]);
    }
    
    $sentenseWithWords = [];
    foreach($sentences as $sentence){
         $sentenceId = Sentence::insertGetId([
                'sentence' => $sentence, 
                'text_id' => $textId, 
            ]);
        $words = explode(' ', trim($sentence));
        $i = 1;
        
        foreach($words as $wordText){

            if(strlen($wordText) != 0){
                $wordModel = SentenseWords::create([
                    'word' => $wordText, 
                    'sentence_id' => $sentenceId, 
                    'flag' => $i
                ]);
                $i++;
            }
        }
    }
    
    return to_route('Text.texts');
}
    
    public function single($id){
           $SeperateSentence=Text::find($id);
            $text = explode('.', trim($SeperateSentence->text));
            unset($text[count($text) - 1]);

            $sentenseWithWords = [];
            foreach($text as $sentence){
                $words = explode(' ', trim($sentence));
                $sentenseWithWords[] = [
                    'sentence' => $sentence,
                    'words' => $words  
                ];
            }
           
            return view("admin.Text.single", ['sentenseWithWords' => $sentenseWithWords]);
        }
      
    public function index(){

    // $text =  "<pre>" . $text . "<pre>" .; // before than  explode

        $texts=Text::all();
        return view("admin.Text.index",['texts'=>$texts]);
    }
    public function delete($id){
        $sentence=Text::find($id);
        if($sentence->words){
            foreach($sentence->words as $word){
                $word->delete();
            }
        }
        $sentence->delete();
       return to_route('Text.texts');
    }
    public function showMeaning($id){
          $text=Text::find($id);
            // $user = auth()->user();
            $user=1;
            $userLeitnerWords = [];
            if ($user) {
                $userLeitnerWords = Leitnary::where('user_id', $user)
                    ->pluck('word_id')
                    ->toArray();
            }
          $text = str_replace( ["\n" , "\t" , "\r"] , " " ,$text->text);

        //   dd($text);
          $sentences = explode('.', trim($text));
        //   dd($sentences);
             if(strlen($sentences[count($sentences) - 1]) < 1 ){
                    unset($sentences[count($sentences) - 1]);
                }
            
            $sentenseWithWords = [];
            //    dd($sentences);
            foreach($sentences as $sentence){
                $words = explode(' ', trim($sentence));
                $wordsData = [];                
                foreach($words as $wordText){
                    if(strlen($wordText) != 0){ 
                        $wordModel = SentenseWords::where([
                            'word' => $wordText, 
                        ])->first();
                        if(isset($wordModel->id)){
                             $inLeitner = in_array($wordModel->id, $userLeitnerWords);
                            $wordsData[] = [
                                'text' => $wordText,
                                'id' => $wordModel->id,
                                'in_leitner' => $inLeitner 
                            ];
                        
                        }
                    }
    
                }
                
                $sentenseWithWords[] = [
                    'sentence' => $sentence,
                    'words' => $wordsData  
                ];
            }
            // dd($sentenseWithWords);
            return view("admin.Text.addLeitnary", ['sentenseWithWords' => $sentenseWithWords]);
    }


    // public function setMeaning($id){
    //   $SeperateSentence=Text::find($id);
    //         $text = explode('.', trim($SeperateSentence->text));
    //         unset($text[count($text) - 1]);

    //         $sentenseWithWords = [];
    //         foreach($text as $sentence){
    //             $words = explode(' ', trim($sentence));
    //             $sentenseWithWords[] = [
    //                 'sentence' => $sentence,
    //                 'words' => $words  
    //             ];
    //         }
    //         return view("admin.Text.showMeaning", ['sentenseWithWords' => $sentenseWithWords]);
    // }
    public function setMeaning($id)
{
  
    $text = Text::find($id);
    $sentences = Sentence::where('text_id', $id)->get();
    
    $sentenseWithWords = [];
    
    foreach ($sentences as $sentence) {
        $words = SentenseWords::where('sentence_id', $sentence->id)->get();
        
        $wordsWithIds = [];
        foreach ($words as $word) {
            $wordsWithIds[] = [
                'id' => $word->id,
                'word' => $word->word
            ];
        }
        
        $sentenseWithWords[] = [
            'sentence_id' => $sentence->id,
            'sentence' => $sentence->sentence, 
            'words' => $wordsWithIds
        ];
    }
    
    return view("admin.Text.showMeaning", ['sentenseWithWords' => $sentenseWithWords]);
}


   public function saveMeanings(Request $request)
{
    $meanings = $request->input('meanings');  
    $wordIds = $request->input('word_ids');  
    foreach ($wordIds as $index => $wordId) {
        $meaning = isset($meanings[$wordId]) ? $meanings[$wordId] : null;
        if ($meaning) {
            SentenseWords::where('id', $wordId)->update(['mean' => $meaning]);
        }
    }
    return redirect()->back();
}

   public function setSentenceMeaning($id){
    $SeperateSentence=Sentence::where('text_id', $id)->get();  
    if(strlen($SeperateSentence[count($SeperateSentence) - 1]) < 1){
        unset($SeperateSentence[count($SeperateSentence) - 1]);
    }
    $sentenseWithIds = [];
    foreach($SeperateSentence as $sentence){
        $sentenceModel = Sentence::where('sentence', $sentence)->first();
        
        $sentenseWithIds[] = [
            'sentence' => $sentence->sentence,
            'id' => $sentence->id
        ];
    }
    
    return view("admin.Text.setSentenceMeaning", ['sentenseWithIds' => $sentenseWithIds]);
}


        public function saveSentenceMeanings(Request $request){
       
         $meanings = $request->input('meaning');
         $sentenceIds = $request->input('sentence_ids');
     
            if($sentenceIds){
                foreach($sentenceIds as $index => $sentenceId){
                    $meaning = $meanings[$index] ?? null;
                    
                    if($meaning){
                        if($sentenceId){
                        Sentence::where('id', $sentenceId)->update(['mean' => $meaning]);
                        }
                    }
                }
            }
            return redirect()->back();  
        }
}








    //     public function store(Request $request){
//     $sentenceId = SeperateSentense::insertGetId(['text' => $request->text]);
    
//     $sentences = explode('.', trim($request->text));
//     unset($sentences[count($sentences) - 1]);
    
//     $sentenseWithWords = [];
//     foreach($sentences as $sentence){
//         $words = explode(' ', trim($sentence));
//         $wordsData = [];
//         $i = 1;
        
//         foreach($words as $wordText){
//             $wordModel = SentenseWords::create([
//                 'word' => $wordText, 
//                 'sentence_id' => $sentenceId, 
//                 'flag' => $i
//             ]);
            
//             $wordsData[] = [
//                 'text' => $wordText,
//                 'id' => $wordModel->id
//             ];
//             $i++;
//         }
        
//         $sentenseWithWords[] = [
//             'sentence' => $sentence,
//             'words' => $wordsData  
//         ];
//     }
    
//     return view("admin.seperateSentence.single", ['sentenseWithWords' => $sentenseWithWords]);
// }

















//first version
    // public function store(Request $request){
    //     $sentenceId=SeperateSentense::insertGetId(['text'=>$request->text]);

    //     $sentences= explode('.' , trim($request->text));

    //     unset($sentences[count($sentences) - 1]);

    //     $sentenseWithWords=[];
    //     foreach($sentences as $sentence){

    //     // echo $sentence . " :: count = " . count(explode(' ',trim($sentence))) . "</br>";

    //         $words= explode(' ',trim($sentence));
    //         // unset();
    //         $i=1;
    //         foreach($words as $word){
    //         SentenseWords::create(['word'=>$word , 'sentence_id'=>$sentenceId , 'flag'=>$i]);
    //         $i++;
    //         }
    //         $sentenseWithWords[]=[
    //             'sentence' => $sentence,
    //             'words' =>$words
    //         ];
    //     }

    //     return view("admin.seperateSentence.single" , ['sentenseWithWords'=>$sentenseWithWords]);
    // }
