<?php

namespace App\Http\Controllers;

use App\UploadQuestion;
use App\UploadQuestion1;
use Illuminate\Http\Request;

class UploadQuestionController  extends Controller
{
    public function showUploadForms(){
        return view('UploadQuestion');
    }
    

    public function storeFiles(request $request){
        
        //return $request-> all();
       
        foreach($request->fileName as $files){

            $fileName =  $files->getClientOriginalName();
            $size =  $files->getClientSize();
            $files->storeAs('public/upload',$fileName);
        

            /*add file into database */
            $UploadQuestion = new UploadQuestion;
            $UploadQuestion ->img_url =$fileName;
            //$UploadQuestion ->size = $size;
            $UploadQuestion -> save();
            

            //create new message
           
            $UploadQuestion1 = new UploadQuestion1;
            $UploadQuestion1->Questions_types_id =$request->input('Upload');
            $UploadQuestion1->number =$request->input('number');
            $UploadQuestion1->solution =$request->input('name');
            $UploadQuestion1->question =$request->input('question');
            $UploadQuestion1->score =$request->input('score');
            //save message
            $UploadQuestion1->save();
           return redirect ('/question/index')->with('success','upload sent') ;
            //return'yes';
            
                

            }

 
        }
        
        
}
  

