<?php

namespace App\Http\Controllers;

use App\blankQuestion;
use App\blankQuestion1;
use Illuminate\Http\Request;

class blankQuestionController  extends Controller
{
    public function showUploadForms(){
        return view('blankQuestion');
    }
    

    public function storeFiles(request $request){
        
        //return $request-> all();
       
        foreach($request->fileName as $files){

            $fileName =  $files->getClientOriginalName();
            $size =  $files->getClientSize();
            $files->storeAs('public/upload',$fileName);
        

            /*add file into database */
            $blankQuestion = new blankQuestion;
            $blankQuestion ->img_url =$fileName;
            //$blankQuestion ->size = $size;
            $blankQuestion -> save();
            

            //create new message
            $blankQuestion1 = new blankQuestion1;
            $blankQuestion1->number =$request->input('number');
            $blankQuestion1->solution =$request->input('name');
            $blankQuestion1->question =$request->input('question');
            $blankQuestion1->score =$request->input('score');
            //save message
            $blankQuestion1->save();
           return redirect ('/question/index')->with('success','upload sent') ;
            //return'yes';
            
                

            }

 
        }
        
        
}
  

