<?php

namespace App\Http\Controllers;

use App\shortAnswerQuestion;
use App\shortAnswerQuestion1;
use Illuminate\Http\Request;
use DB;

class shortAnswerQuestionController extends Controller
{
    public function showUploadForms(){
        return view('shortAnswer');
    }
    

    public function storeFiles(request $request){
        
        //return $request-> all();

         $currentQuestionId = DB::table('Questions')->max('questions_id');
        
         $lastestQuestinID = $currentQuestionId+1;
       
        foreach($request->fileName as $files){

            $fileName =  $files->getClientOriginalName();
            $size =  $files->getClientSize();
            $files->storeAs('public/upload',$fileName);
        

             //create new message
             $shortAnswerQuestion1 = new shortAnswerQuestion1;
            
             $shortAnswerQuestion1->Questions_types_id =$request->input('Shortanswe');
             $shortAnswerQuestion1->number =$request->input('number');
             $shortAnswerQuestion1->solution =$request->input('name');
             $shortAnswerQuestion1->question =$request->input('question');
             $shortAnswerQuestion1->score =$request->input('score');
             //save message
             $shortAnswerQuestion1->save();

            /*add file into database */
            $shortAnswerQuestion = new shortAnswerQuestion;
            $shortAnswerQuestion ->img_url =$fileName;
            $shortAnswerQuestion ->questions_id =$lastestQuestinID;
            //$blankQuestion ->size = $size;
            $shortAnswerQuestion -> save();
            

           

           return redirect ('/question/index')->with('success','upload sent') ;
            //return'yes';
            
                

            }

 
        }
        
        
}
