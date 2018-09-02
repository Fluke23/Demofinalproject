<?php

namespace App\Http\Controllers;

use App\shortAnswerQuestion;
use App\shortAnswerQuestion1;
use Illuminate\Http\Request;

class shortAnswerQuestionController extends Controller
{
    public function showUploadForms(){
        return view('shortAnswer');
    }
    

    public function storeFiles(request $request){
        
        //return $request-> all();
       
        foreach($request->fileName as $files){

            $fileName =  $files->getClientOriginalName();
            $size =  $files->getClientSize();
            $files->storeAs('public/upload',$fileName);
        

            /*add file into database */
            $shortAnswerQuestion = new shortAnswerQuestion;
            $shortAnswerQuestion ->img_url =$fileName;
            //$blankQuestion ->size = $size;
            $shortAnswerQuestion -> save();
            

            //create new message
            $shortAnswerQuestion1 = new shortAnswerQuestion1;
            
            $shortAnswerQuestion1->Questions_types_id =$request->input('Shortanswe');
            $shortAnswerQuestion1->number =$request->input('number');
            $shortAnswerQuestion1->solution =$request->input('name');
            $shortAnswerQuestion1->question =$request->input('question');
            $shortAnswerQuestion1->score =$request->input('score');
            
            //save message
            $shortAnswerQuestion1->save();
           return redirect ('/question/index')->with('success','upload sent') ;
            //return'yes';
            
                

            }

 
        }
        
        
}
