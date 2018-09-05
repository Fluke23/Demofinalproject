<?php

namespace App\Http\Controllers;

use App\blankQuestion;
use App\blankQuestion1;
use Illuminate\Http\Request;
use DB;

class blankQuestionController  extends Controller
{
    public function showUploadForms(){
        return view('blankQuestion');
    }
    

    public function storeFiles(request $request){
        
        //return $request-> all();

        // $blankQuestion1 = new blankQuestion1;
        $currentQuestionId = DB::table('Questions')->max('questions_id');
        
        $lastestQuestinID = $currentQuestionId+1;

        // dd($lastestQuestinID);
        

        foreach($request->fileName as $files){



            $fileName =  $files->getClientOriginalName();
            $size =  $files->getClientSize();
            $files->storeAs('public/upload',$fileName);

                        //create new message
                        $blankQuestion1 = new blankQuestion1;
                        $blankQuestion1->questions_types_id =$request->input('Blank');
                        $blankQuestion1->number =$request->input('number');
                        $blankQuestion1->solution =$request->input('name');
                        $blankQuestion1->question =$request->input('question');
                        $blankQuestion1->score =$request->input('score');
                        //save message
                        $blankQuestion1->save();
        

            /*add file into database */
            $blankQuestion = new blankQuestion;
            $blankQuestion ->img_url =$fileName;
            $blankQuestion ->questions_id =$lastestQuestinID;
            //$blankQuestion ->size = $size;
            $blankQuestion -> save();
            

           return redirect ('/question/index')->with('success','upload sent') ;
            //return'yes';
            }

        


        // //หนึ่งเพิ่มเอง ลบด้วยถ้าผิด 
        //  $question_picture = new    
        //  $question = new ([
        //     'number' =>$request->get('number'),
        //     'solution' => $request->get('name'),
        //     'question' => $request->get('question'),
        //     'score' => $request->get('score'),
        //     'questions_types_id' => $request->get('questions_types_id'),
        // ]);

        // $question->save();
        // //end of หนึ่งเพิ่มเอง 


 
        }
        
        
}
  

